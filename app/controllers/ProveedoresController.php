<?php

class ProveedoresController extends BaseController {
  protected $layout = "layouts.default";

  public function crear(){
    $this->layout->content = View::make('proveedores.crear');
  }
  
  public function consultar(){
    $this->layout->content = View::make('proveedores.consultar');
  }
  
  public function editar(){
    $this->layout->content = View::make('proveedores.editar');
  }
  public function eliminar(){
     $this->layout->content = View::make('proveedores.eliminar');
  }
}