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
    $cliente->save();
    
    return Redirect::to('/listado/clientes');
  }
  
  public function consultar(){
    $this->layout->content = View::make('clientes.consultar');
  }
  
    public function registrar(){
      View::share('titulo', "Registro de Cliente");
    $ciudad = Ciudad::get();
    $this->layout->content = View::make('clientes.registrar')->withCiudad($ciudad);
  }
  
  public function registrando()
  {
View::share('titulo', "Registrando Cliente");
    
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
    $cliente->save();
    
    return Redirect::to('/login');
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
}