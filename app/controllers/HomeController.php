<?php
class HomeController extends BaseController {
  protected $layout = "layouts.default";
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
  public function __construct()
  {
    if (Request::is("sesion/administrador"))
    {
        $this->layout = "layouts.admin";
    }
    if (Request::is("/"))
    {
        $this->layout = "layouts.indexLayout";
    }
  }

  public function index(){
    View::share('titulo', "Inicio");
    
    $producto = Producto::orderBy('visitas', 'desc')->where("activo", "=", true)->where("cantidad", ">", "encargados")->where('uso_interno', false)->take(8)->get();
    
    $this->layout->content = View::make('index')->withProductos($producto);
  } 
  
  public function quienesSomos(){
    View::share('titulo', "Quienes somos");
    $this->layout->content = View::make('quienesSomos');
  }
  
  public function administrador(){
    View::share('titulo', "Administración");
    $this->layout->content = View::make('administrador');

  }



  public function contacto(){
    View::share('titulo', "Contacto");
    $this->layout->content = View::make('contacto');
  }
  
  const MY_NAME = "Marco Rojas";
  const MY_EMAIL = "fergushog@hotmail.com";
  public function enviarContacto(){

    //Get all the data and store it inside Store Variable
    $data = Input::all();

    //Validation rules
    $rules = array (
      'nombre' => 'required|alpha_spaces',
      'email' => 'required|email',
      'mensaje' => 'required|min:10',
      'asunto' => 'required|min:5'
    );

    //Validate data
    $validator  = Validator::make ($data, $rules);

    //If everything is correct than run passes.
    if ($validator -> passes()){

      //Send email using Laravel send function
      Mail::send('emails.contacto', $data, function($message) use ($data)
                 {
                   //email 'From' field: Get users email add and name
                   $message->from($data['email'], $data['nombre']);
                   //email 'To' field: cahnge this to emails that you want to be notified.                    
                   $message->to(self::MY_EMAIL, self::MY_NAME)->subject($data["asunto"]);

                 });

      return Redirect::to('/contacto')->withErrors('Email enviado correctamente.');  
    }else{
      //return contact form with errors
      return Redirect::to('/contacto')->withErrors($validator);
    }
  }
  
  public function compras(){
    View::share('titulo', "Compras");
    $this->layout->content = View::make('order');
  }
  
   public function vendedor(){
     View::share('titulo', "Menú vendedor");
    $this->layout->content = View::make('vendedor');
  }
 
  public function cliente(){
    View::share('titulo', "Menú cliente");
    $this->layout->content = View::make('cliente');
  }
  
  
   public function login($message = ""){
     View::share('titulo', "Login");
    $this->layout->content = View::make('login')->withMessage($message);
  }
  
  public function logout(){
    View::share('titulo', "Logout");
    //$this->layout->content = View::make('logout');
    Auth::logout();
    return Redirect::to('/');
  }
  
  
  public function logeando()
  {
    
    // Guardamos en un arreglo los datos del usuario.
    $userdata = array(
      'rut' => Input::get('usuario'),
      'password'=> Input::get('pass'),
    );
    
    if(Usuario::where('rut', $userdata["rut"])->first() && !Usuario::where('rut', $userdata["rut"])->first()->activo)
      {
      $error = "No tienes permiso para entrar al sistema.";
      return Redirect::back()->withErrors($error)->withInput(Input::except('pass')); // redirect back to the login page, using ->withErrors($errors) you send the error created above
  
  }
    if(Auth::attempt($userdata))
    {
        
      switch (Auth::user()->tipo_usuario)
      {
        case 'administrador':
          return Redirect::to('/sesion/administrador');
        break;
        case 'vendedor':
          return Redirect::to('/sesion/vendedor');
        break;
        case 'cliente':
          return Redirect::to('/sesion/cliente');
        break;
      }
      
    }
    else
    {
       $error = "Combinación de rut y contraseña inválido.";
      return Redirect::back()->withErrors($error)->withInput(Input::except('pass')); // redirect back to the login page, using ->withErrors($errors) you send the error created above
  
    }
  }
  public function fb_logeando()
  {
    $usuario = Usuario::where('fb_id', Input::get("id"));
    if($usuario->count() > 0 )
    {
      if ($usuario->first()->activo)
      {
        //se logea en el sistema
        Auth::login($usuario->first());
        return 'true';
      }
      else
      {
        $error = "No tienes permiso para entrar al sistema.";
        //TODO: fb logout
        return Redirect::back()->withErrors($error)->withInput(Input::except('pass')); 
      }
    }
    else
    {
      $usuario = Usuario::where('mail', Input::get('email'));
      if (Input::get('email') != null && $usuario->count() >0)
      {
        $usuario = $usuario->first();
        if($usuario->activo)
        {
          //registro fb
          $usuario->fb_id = Input::get('id');
          //logeo
          //se logea en el sistema
          Auth::login($usuario);
          
          return 'true';
        }
        else
        {
          $error = "No tienes permiso para entrar al sistema.";
          //TODO: fb logout
          return Redirect::back()->withErrors($error)->withInput(Input::except('pass')); 
        }
      }
      else
      {
        
        /*
        //Validation rules
        $rules = array (
          //'rut' => 'required|unique:usuario,rut',
          'nombre' => 'required|alpha_spaces',
          //'pass' => 'required|min:4',
          //'direccion' => 'min:5',
          'fechaDeNacimiento' => 'required',
          'sexo' => 'required',
          'email' => 'required|email|unique:usuario,mail',
          'fono' => 'required|numeric'
        );
*/
        //Validate data
        //      $validator  = Validator::make ($data, $rules);

        //If everything is correct than run passes.
        //    if ($validator -> passes()){

        //  if ($this->validarRut(Input::get('rut')))
        //{
        $cliente = new Usuario();
        $cliente->nom_usuario = Input::get('nombre');
        //$cliente->contrasena = Hash::make(Input::get('pass'));
        //$cliente->direccion = Input::get('direccion');
        $cliente->fecha_nacimiento = Input::get('fechaDeNacimiento');
        $cliente->fb_id = Input::get('id');
        //$cliente->cod_ciudad = Input::get('ciudad');
        $cliente->sexo = Input::get('sexo');
        $cliente->mail = Input::get('email');
        $cliente->tipo_usuario = 'cliente';  
        $cliente->activo = 1;
        $cliente->save();
        

        Auth::login($cliente);
        
        return 'true';
        
      }
    }
  }
  //Deshabilitar google analytics
  public function dga()
  {
    return View::make('disableGoogleAnalytics');
  }
  
}
