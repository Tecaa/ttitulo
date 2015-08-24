<?php

class VendedoresController extends BaseController {
  protected $layout = "layouts.admin";

  public function crear(){
    $ciudad = Ciudad::get();
    View::share('titulo', "Crear Vendedor");
    $this->layout->content = View::make('vendedores.crear')->withCiudad($ciudad);
  }

  public function creando()
  {
    View::share('titulo', "Creando Vendedor");
    $vendedor = new Usuario();
    $vendedor->rut = Input::get('rut');
    $vendedor->nom_usuario = Input::get('nombre');
    $vendedor->contrasena = Hash::make(Input::get('pass'));
    $vendedor->direccion = Input::get('direccion');
    $vendedor->fecha_nacimiento = Input::get('fnac');
    $vendedor->cod_ciudad = Input::get('ciudad');
    $vendedor->sexo = Input::get('sexo');
    $vendedor->mail = Input::get('mail');
    $vendedor->fono = Input::get('fono');
    $vendedor->tipo_usuario = 'vendedor';  
    $vendedor->activo = true;
    $vendedor->save();
    
    return Redirect::to('/listado/vendedores');
  }
  
  public function consultar(){
    $this->layout->content = View::make('vendedores.consultar');
  }
  
  public function editar($rut){
    $ciudad = Ciudad::get();
    $vendedor = Usuario::where('rut', $rut)->first();
    View::share('titulo', "Editar Vendedor");
    $this->layout->content = View::make('vendedores.editar')->withCiudad($ciudad)->withVendedor($vendedor);
  }

  public function editando($rut)
  {
    View::share('titulo', "Editando Vendedor");
    $vendedor = Usuario::where('rut', $rut)->first());
  //  $vendedor->rut = Input::get('rut');
    $vendedor->nom_usuario = Input::get('nombre');
   // $vendedor->contrasena = Hash::make(Input::get('pass'));
    $vendedor->direccion = Input::get('direccion');
    $vendedor->fecha_nacimiento = Input::get('fnac');
    $vendedor->cod_ciudad = Input::get('ciudad');
    $vendedor->sexo = Input::get('sexo');
    $vendedor->mail = Input::get('mail');
    $vendedor->fono = Input::get('fono');
    $vendedor-> tipo_usuario = 'vendedor';
    $vendedor->save();
    
    return Redirect::to('/listado/vendedores');
  }
  
  public function eliminar(){
    View::share('titulo', "Eliminar Vendedor");
     $this->layout->content = View::make('vendedores.eliminar');
  }
  
  public function eliminando($rut){
    View::share('titulo', "Eliminar Vendedor");
    $vendedor = Usuario::where('rut', $rut)->first();
    $vendedor -> activo = false; 
    $vendedor->save();
    return Redirect::to('/listado/vendedores');
  }
  

    public function activando($rut){
    View::share('titulo', "Activar Vendedor");
    $vendedor = Usuario::where('rut', $rut)->first();
    $vendedor->activo = true;
    $vendedor->save();
    return Redirect::to('/listado/vendedores');
  }
}