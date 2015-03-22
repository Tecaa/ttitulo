<?php

class BancosController extends BaseController {
  protected $layout = "layouts.admin";

  public function crear(){
    View::share('titulo', "Crear Banco");
    $this->layout->content = View::make('bancos.crear');
  }
  
  public function creando()
  {
    View::share('titulo', "Creando Banco");
    $banco = new Banco();
    $banco->nom_banco = Input::get('nombre');
    $banco->save();
    
    return Redirect::to('/listado/bancos');
  }
  
  public function consultar(){
    $this->layout->content = View::make('bancos.consultar');
  }
  
  public function editar($cod_banco){
    $banco = Banco::find($cod_banco);
    View::share('titulo', "Editar Banco");
    $this->layout->content = View::make('bancos.editar')->withBanco($banco);;
  }
  
    public function editando($cod_banco)
  {
    View::share('titulo', "Editando Banco");
    $banco = Banco::find($cod_banco);
    $banco->nom_banco = Input::get('nombre');
    $banco->save();
    
    return Redirect::to('/listado/bancos');
  }
  
  public function eliminar(){
    View::share('titulo', "Eliminar Banco");
     $this->layout->content = View::make('bancos.eliminar');
  }
  
   public function eliminando($cod_banco){
    View::share('titulo', "Eliminar Banco");
    $banco = Banco::find($cod_banco);
    $banco->delete();
    return Redirect::to('/listado/bancos');
  }
}