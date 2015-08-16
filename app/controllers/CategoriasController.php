<?php

class CategoriasController extends BaseController {
  protected $layout = "layouts.admin";

  
  public function crear(){
     View::share('titulo', "Crear categoría");
    $this->layout->content = View::make('categorias.crear');
  }
  
  public function creando()
  {
    View::share('titulo', "Creando Categoría");
    $categoria = new Categoria();
    $categoria->nom_categoria = Input::get('nombre');
    $categoria->descripcion = Input::get('descripcion');
    $categoria->tipo = Input::get('tipo');
    
    $categoria->save();
    
    return Redirect::to('/listado/categorias');
  }
  
  public function consultar(){
    View::share('titulo', "Consultar categoría");
    $this->layout->content = View::make('categorias.consultar');
  }
  
  public function editar($cod_categoria){
    $cat = Categoria::find($cod_categoria);
    View::share('titulo', "Editar categoría");
    $this->layout->content = View::make('categorias.editar')->withCategoria($cat);;
  }
  
    public function editando($cod_categoria)
  {
    View::share('titulo', "Editando Ciudad");
    $categoria = Categoria::find($cod_categoria);
    $categoria->nom_categoria = Input::get('nombre');
    $categoria->descripcion = Input::get('descripcion');
    $categoria->tipo = Input::get('tipo');
    $categoria->save();
    
    return Redirect::to('/listado/categorias');
  }
  
  public function eliminar(){
    View::share('titulo', "Eliminar categoría");
     $this->layout->content = View::make('categorias.eliminar');
  }
  
  public function eliminando($cod_categoria){
    View::share('titulo', "Eliminar Categoría");
    $categorias = Categoria::find($cod_categoria);
    $categorias->delete();
    return Redirect::to('/listado/categorias');
  }
}