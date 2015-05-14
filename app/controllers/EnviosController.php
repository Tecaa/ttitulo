<?php

class EnviosController extends BaseController {
  protected $layout = "layouts.admin";

  public function crear(){
    View::share('titulo', "Crear Método de envío");
    $this->layout->content = View::make('envios.crear');
  }
  
  public function creando()
  {
    View::share('titulo', "Creando Método de Envío");
    $metodo = new MetodoEnvio();
    $metodo->nombre = Input::get('nombre');
    $metodo->costo = Input::get('costo');
    $metodo->save();
    
    return Redirect::to('/listado/metodos/envios');
  }
  
  
  public function editar($cod_metodo){
    $metodo = MetodoEnvio::find($cod_metodo);
    View::share('titulo', "Editar Método de Envío");
    $this->layout->content = View::make('envios.editar')->withMetodo($metodo);;
  }
  
   public function editando($cod_metodo)
  {
    View::share('titulo', "Editando Método de Envío");
    $metodo = MetodoEnvio::find($cod_metodo);
    $metodo->nombre = Input::get('nombre');
    $metodo->costo = Input::get('costo');
    $metodo->save();
    
    return Redirect::to('/listado/metodos/envios');
  }
  
  public function eliminar(){
    View::share('titulo', "Eliminar Método de Envío");
     $this->layout->content = View::make('envios.eliminar');
  }
  
   public function eliminando($cod_metodo){
    View::share('titulo', "Eliminar Método de Envío");
    $metodo = MetodoEnvio::find($cod_metodo);
    $metodo->delete();
    return Redirect::to('/listado/metodos/envios');
  }
}