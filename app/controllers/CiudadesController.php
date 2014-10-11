<?php

class CiudadesController extends BaseController {
  protected $layout = "layouts.default";

  public function crear(){
    $this->layout->content = View::make('ciudades.crear');
  }
  
  public function consultar(){
    $this->layout->content = View::make('ciudades.consultar');
  }
  
  public function editar(){
    $this->layout->content = View::make('ciudades.editar');
  }
  public function eliminar(){
     $this->layout->content = View::make('ciudades.eliminar');
  }
}