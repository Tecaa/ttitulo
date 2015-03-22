<?php

class LoginController extends BaseController {
  protected $layout = "layouts.admin";
  
  public function login(){
    View::share('titulo', "Iniciar Sesión");
    $this->layout->content = View::make('login');
    
  }
  
 }  