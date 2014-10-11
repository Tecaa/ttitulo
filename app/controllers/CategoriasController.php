<?php

class CategoriasController extends BaseController {
  protected $layout = "layouts.default";

  public function crear(){
    $this->layout->content = View::make('categorias.crear');
  }
  
  public function consultar(){
    $this->layout->content = View::make('categorias.consultar');
  }
  
  public function editar(){
    $this->layout->content = View::make('categorias.editar');
  }
  public function eliminar(){
     $this->layout->content = View::make('categorias.eliminar');
  }
}