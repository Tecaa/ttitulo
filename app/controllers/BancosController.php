<?php

class BancosController extends BaseController {
  protected $layout = "layouts.default";

  public function crear(){
    $this->layout->content = View::make('bancos.crear');
  }
  
  public function consultar(){
    $this->layout->content = View::make('bancos.consultar');
  }
  
  public function editar(){
    $this->layout->content = View::make('bancos.editar');
  }
  public function eliminar(){
     $this->layout->content = View::make('bancos.eliminar');
  }
}