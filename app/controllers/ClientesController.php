<?php

class ClientesController extends BaseController {
  protected $layout = "layouts.admin";

  public function __construct()
  {
    if (Request::is("cliente/registrarse"))
    {
      $this->layout = "layouts.page-content";
    }
  }
  public function crear(){
    $ciudad = Ciudad::get();
    View::share('titulo', "Crear Cliente");
    $this->layout->content = View::make('clientes.crear')->withCiudad($ciudad);
  }

  public function creando()
  {
    View::share('titulo', "Creando Cliente");
    $cliente = new Usuario();
    $cliente->rut = Input::get('rut');
    $cliente->nom_usuario = Input::get('nombre');
    $cliente->contrasena = Hash::make(Input::get('pass'));
    $cliente->direccion = Input::get('direccion');
    $cliente->fecha_nacimiento = Input::get('fnac');

    $cliente->cod_ciudad = Input::get('ciudad');
    $cliente->sexo = Input::get('sexo');
    $cliente->mail = Input::get('mail');
    $cliente->fono = Input::get('fono');
    $cliente-> tipo_usuario = 'cliente';  
    $cliente-> activo = 1;
    $cliente->save();

    return Redirect::to('/listado/clientes');
  }

  public function consultar(){
    $this->layout->content = View::make('clientes.consultar');
  }

  public function registrar(){
    View::share('titulo', "Registro de Cliente");
    $ciudad = Ciudad::orderby("nom_ciudad")->get();
    $this->layout->content = View::make('clientes.registrar')->withCiudad($ciudad);
  }

  public function registrando()
  {
    View::share('titulo', "Registrando Cliente");
    //Get all the data and store it inside Store Variable
    $data = Input::all();

    //Validation rules
    $rules = array (
      'rut' => 'required|unique:usuario,rut',
      'nombre' => 'required|alpha_spaces',
      'pass' => 'required|min:4',
      'direccion' => 'min:5',
      'fechaDeNacimiento' => 'required',
      'sexo' => 'required',
      'email' => 'required|email|unique:usuario,mail',
      'fono' => 'required|numeric'
    );

    //Validate data
    $validator  = Validator::make ($data, $rules);

    //If everything is correct than run passes.
    if ($validator -> passes()){

      if ($this->validarRut(Input::get('rut')))
      {
        $cliente = new Usuario();
        $cliente->rut = Input::get('rut');
        $cliente->nom_usuario = Input::get('nombre');
        $cliente->contrasena = Hash::make(Input::get('pass'));
        $cliente->direccion = Input::get('direccion');
        $cliente->fecha_nacimiento = Input::get('fechaDeNacimiento');
        $cliente->cod_ciudad = Input::get('ciudad');
        $cliente->sexo = Input::get('sexo');
        $cliente->mail = Input::get('email');
        $cliente->fono = Input::get('fono');
        $cliente->tipo_usuario = 'cliente';  
        $cliente->activo = 1;
        $cliente->save();
        $message = "Cliente registrado satisfactoriamente, por favor ingrese a nuestra página con los datos registrados.";
        return Redirect::to('/cuenta/login')->withMessage($message);;
      }
      else
      {
        $error = "Rut ingresado incorrecto.";
        return Redirect::to("cliente/registrarse")->withInput()->withErrors($error);
      }
    }
    else
      return Redirect::to("cliente/registrarse")->withInput()->withErrors($validator);
  }
  
  public function validarRut($rut)
  {
    $m = 2;
    $suma = 0;
	
    for($i=strlen($rut)-3; $i>=0; --$i)
    { 
      $suma += intval($rut[$i])*$m;
      if(++$m==8)
        $m = 2;
    }
    $dv = $suma % 11;
    $dv = 11 - $dv;
    switch($dv)
    {
      case 11:
        $dv = "0";
        break;
      case 10:
        $dv = "K";
        break;
      default:
        $dv = (string)$dv;
        break;
    }
	
    if ($dv == strtoupper($rut[strlen($rut)-1]))
      return true;
    else
      return false;
  }
  
 
  public function editar($rut){
    $ciudad = Ciudad::get();
    $cliente = Usuario::find($rut);
    View::share('titulo', "Editar Cliente");
    $this->layout->content = View::make('clientes.editar')->withCiudad($ciudad)->withCliente($cliente);
  }
  
  public function editando($rut)
  {
    View::share('titulo', "Editando Cliente");
    $cliente = Usuario::find($rut);
    //$cliente->rut = Input::get('rut');
    $cliente->nom_usuario = Input::get('nombre');
   // $cliente->contrasena = Hash::make(Input::get('pass'));
    $cliente->direccion = Input::get('direccion');
    $cliente->fecha_nacimiento = Input::get('fnac');
    $cliente->cod_ciudad = Input::get('ciudad');
    $cliente->sexo = Input::get('sexo');
    $cliente->mail = Input::get('mail');
    $cliente->fono = Input::get('fono');
    $cliente-> tipo_usuario = 'cliente';  
    $cliente->save();
    
    return Redirect::to('/listado/clientes');
  }
  
  public function eliminar(){
    View::share('titulo', "Eliminar Cliente");
     $this->layout->content = View::make('clientes.eliminar');
  }
  
   public function eliminando($rut){
    View::share('titulo', "Eliminar Cliente");
    $cliente = Usuario::find($rut);
    $cliente->delete();
    return Redirect::to('/listado/clientes');
  }
  
  public function micuenta(){
    View::share('titulo', "Mi Cuenta");
    $ciudad = Ciudad::get();
   
    $cliente = Auth::user();
    $this->layout->content = View::make('clientes.micuenta')->withCiudad($ciudad)->withCliente($cliente);

  }
  
  public function modificar(){
    $ciudad = Ciudad::get();
    $user = Auth::user();
    View::share('titulo', "Modificar Datos");
    $this->layout->content = View::make('clientes.modificar')->withCiudad($ciudad)->withUser($user);
  }  
  
  public function modificando()
  {
    View::share('titulo', "Modificando Datos");
    $cliente = Auth::user();
    $cliente->nom_usuario = Input::get('nombre');
    $cliente->direccion = Input::get('direccion');
    $cliente->fecha_nacimiento = Input::get('fnac');
    $cliente->cod_ciudad = Input::get('ciudad');
    $cliente->sexo = Input::get('sexo');
    $cliente->mail = Input::get('mail');
    $cliente->fono = Input::get('fono');
    $cliente->save();
    
    return Redirect::to('/micuenta');
  }
  
   public function modificarpass(){

    $cliente = Auth::user();
    View::share('titulo', "Modificar Contraseña");
    $this->layout->content = View::make('clientes.modificarpass');//->withCliente($cliente);
  }  
  
  public function modificandopass(){
    View::share('titulo', "Modificando Contraseña");
    $cliente = Auth::user();
    $userdata = array(
      'rut' => $cliente->rut,
      'password'=> Input::get('pass'),
    );
    
    if(Auth::attempt($userdata))
    {
      if (Input::get('nueva') == Input::get('nueva2'))
      {
        $cliente->contrasena = Hash::make(Input::get('nueva2'));
        $cliente->save();
        $msg = "La contraseña se ha actualizado correctamente.";
        return Redirect::back()->with("msg", $msg);
      }
      else
      {
        $error = "Las contraseñas nuevas no coinciden.";
        return Redirect::back()->withErrors($error)->withInput(Input::except('pass|nueva|nueva2'));
      }
    }
    else
    {
        $error = "La contraseña antigua no es la correcta.";
        return Redirect::back()->withErrors($error)->withInput(Input::except('pass|nueva|nueva2'));
    }
  }  
  
}