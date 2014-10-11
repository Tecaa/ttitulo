<?php

class ListadoController extends BaseController {
  protected $layout = "layouts.default";

  public function ventas(){
    $this->layout->content = View::make('listados.ventas');
  }
  
  public function productos(){
    $this->layout->content = View::make('listados.productos');
  }
  
  
}