<?php

class LaboratoriosController extends BaseController {
  protected $layout = "layouts.default";

  public function crear(){
    $this->layout->content = View::make('laboratorios.crear');
  }
  
  public function consultar(){
    $this->layout->content = View::make('laboratorios.consultar');
  }
  
  public function editar(){
    $this->layout->content = View::make('laboratorios.editar');
  }
  public function eliminar(){
     $this->layout->content = View::make('laboratorios.eliminar');
  }
}