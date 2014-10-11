<?php

class RegionesController extends BaseController {
  protected $layout = "layouts.default";

  public function crear(){
    $this->layout->content = View::make('regiones.crear');
  }
  
  public function consultar(){
    $this->layout->content = View::make('regiones.consultar');
  }
  
  public function editar(){
    $this->layout->content = View::make('regiones.editar');
  }
  public function eliminar(){
     $this->layout->content = View::make('regiones.eliminar');
  }
}