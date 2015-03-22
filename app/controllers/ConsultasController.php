<?php

class ListadoController extends BaseController {
  protected $layout = "layouts.admin";

  public function consultaLab(){
    View::share('titulo', "Lista de Laboratorios");
    $this->layout->content = View::make('listados.consultaLab');
  }
  
}  