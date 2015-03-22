<?php

class InformeController extends BaseController {
  protected $layout = "layouts.admin";

  public function opcion(){
     View::share('titulo', "Informes");
    $this->layout->content = View::make('informes.opcion');
  }

}  