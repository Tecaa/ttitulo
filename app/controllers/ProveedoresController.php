<?php

class ProveedoresController extends BaseController {
  protected $layout = "layouts.admin";

  public function __construct()
  {
    if (Request::is("producto/listar"))
    {
      $this->layout = "layouts.catalogue";
    }
    if (Request::is("producto/consultar/1"))
    {
      $this->layout = "layouts.page-content";
    }
  }
  
  public function crear(){
    $ciudad = Ciudad::get();
    View::share('titulo', "Crear Proveedor");
    $this->layout->content = View::make('proveedores.crear')->withCiudad($ciudad);
  }

  public function creando()
  {
    View::share('titulo', "Creando Proveedor");
    $proveedor = new Proveedor();
    $proveedor->cod_proveedor = Input::get('cod');
    $proveedor->nom_proveedor = Input::get('nombre');
    $proveedor->direccion_prov = Input::get('direccion');
    $proveedor->fono_prov = Input::get('fono');
    $proveedor->cod_ciudad = Input::get('ciudad');
    $proveedor->mail_prov = Input::get('mail');
    $proveedor->save();
    
    return Redirect::to('/listado/proveedores');
  }
  
  public function consultar(){
    $this->layout->content = View::make('proveedores.consultar');
  }
  
  public function editar($cod_prov){
    $ciudad = Ciudad::get();
    $proveedor= Proveedor::find($cod_prov);
    View::share('titulo', "Editar Proveedor");
    $this->layout->content = View::make('proveedores.editar')->withCiudad($ciudad)->withProveedor($proveedor);
  }
  
    public function editando($cod_prov)
  {
    View::share('titulo', "Editando Cliente");
    $proveedor = Proveedor::find($cod_prov);
    $proveedor->cod_proveedor = Input::get('cod');
    $proveedor->nom_proveedor = Input::get('nombre');
    $proveedor->direccion_prov = Input::get('direccion');
    $proveedor->fono_prov = Input::get('fono');
    $proveedor->cod_ciudad = Input::get('ciudad');
    $proveedor->mail_prov = Input::get('mail');
    $proveedor->save();
    
    return Redirect::to('/listado/proveedores');
  }

  
  public function eliminar(){
     $this->layout->content = View::make('proveedores.eliminar');
  }
  
  public function eliminando($cod_prov){
    View::share('titulo', "Eliminar Categoría");
    $proveedor = Proveedor::find($cod_prov);
    $proveedor->delete();
    return Redirect::to('/listado/proveedores');
  }
}