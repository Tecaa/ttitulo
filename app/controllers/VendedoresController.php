<?php

class VendedoresController extends BaseController {
  protected $layout = "layouts.default";

  public function crear(){
    $this->layout->content = View::make('vendedores.crear');
  }
  
  public function consultar(){
    $this->layout->content = View::make('vendedores.consultar');
  }
  
  public function editar(){
    $this->layout->content = View::make('vendedores.editar');
  }
  public function eliminar(){
     $this->layout->content = View::make('vendedores.eliminar');
  }
}