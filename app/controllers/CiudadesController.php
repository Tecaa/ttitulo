<?php

class CiudadesController extends BaseController {
  protected $layout = "layouts.admin";

  public function crear(){
    View::share('titulo', "Crear Ciudad");
    $this->layout->content = View::make('ciudades.crear');    
  }
  
  public function creando()
  {
    View::share('titulo', "Creando Ciudad");
    $ciudad = new Ciudad();
    $ciudad->nom_ciudad = Input::get('nombre');
    $ciudad->save();
    
    return Redirect::to('/listado/ciudades');
  }
  
  public function consultar(){
    $this->layout->content = View::make('ciudades.consultar');
  }
  
  public function editar($cod_ciudad){
    $ciudad = Ciudad::find($cod_ciudad);
    View::share('titulo', "Editar Ciudad");
    $this->layout->content = View::make('ciudades.editar')->withCiudades($ciudad);;
  }
   
  
  public function editando($cod_ciudad)
  {
    View::share('titulo', "Editando Ciudad");
    $ciudad = Ciudad::find($cod_ciudad);
    $ciudad->nom_ciudad = Input::get('nombre');
    $ciudad->save();
    
    return Redirect::to('/listado/ciudades');
  }
  
  
  public function eliminar(){
     $this->layout->content = View::make('ciudades.eliminar');
  }
  
   public function eliminando($cod_ciudad){
    View::share('titulo', "Eliminar Categoría");
    $ciudad = Ciudad::find($cod_ciudad);
    $ciudad->delete();
    return Redirect::to('/listado/ciudades');
  }
}