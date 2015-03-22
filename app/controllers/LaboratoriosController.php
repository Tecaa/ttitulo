<?php

class LaboratoriosController extends BaseController {
  protected $layout = "layouts.admin";

  public function crear(){
    View::share('titulo', "Crear Laboratorio");
    $this->layout->content = View::make('laboratorios.crear');
  }
  
  public function creando()
  {
    View::share('titulo', "Creando Laboratorio");
    $laboratorio = new Laboratorio();
    $laboratorio->nom_laboratorio = Input::get('nombre');
    $laboratorio->save();
    
    return Redirect::to('/listado/laboratorios');
  }
  
  public function consultar(){
    $this->layout->content = View::make('laboratorios.consultar');
  }
  
  public function editar($cod_laboratorio){
    $laboratorio = Laboratorio::find($cod_laboratorio);
    View::share('titulo', "Editar Laboratorio");
    $this->layout->content = View::make('laboratorios.editar')->withLaboratorio($laboratorio);
  }

public function editando($cod_laboratorio)
  {
    View::share('titulo', "Editando Laboratorio");
    $laboratorio = Laboratorio::find($cod_laboratorio);
    $laboratorio->nom_laboratorio = Input::get('nombre');
    $laboratorio->save();
    
    return Redirect::to('/listado/laboratorios');
  }   
  
  public function eliminar(){
     $this->layout->content = View::make('laboratorios.eliminar');
  }
  
  public function eliminando($cod_laboratorio){
    View::share('titulo', "Eliminar Laboratorio");
    $laboratorio = Laboratorio::find($cod_laboratorio);
    $laboratorio->delete();
    return Redirect::to('/listado/laboratorios');
  }
}