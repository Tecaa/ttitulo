<?php

class ClientesController extends BaseController {
  protected $layout = "layouts.default";

  public function crear(){
    $this->layout->content = View::make('clientes.crear');
  }
  
  public function consultar(){
    $this->layout->content = View::make('clientes.consultar');
  }
  
  public function editar(){
    $this->layout->content = View::make('clientes.editar');
  }
  public function eliminar(){
     $this->layout->content = View::make('clientes.eliminar');
  }
}