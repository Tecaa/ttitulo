<?php

class ProductoController extends BaseController {
  protected $layout = "layouts.default";

  
  public function crear(){
    $labs = Laboratorio::get();
    
    $this->layout->content = View::make('producto.crear')->withLabs($labs);
    $this->layout->content->menu = View::make('compartidos.adminMenu');
  }
  
  public function creando()
  {
    $producto = new Producto();
    $producto->nombre_producto = Input::get('nombre');
    $producto->codigo_barras = Input::get('codigoB');
    $producto->cod_laboratorio = Input::get('laboratorio');
    $producto->cantidad = Input::get('cantidad');
    $producto->precio_venta = Input::get('precio');
    $producto->imagen = Input::get('imagen');
    $producto->save();
  }
  
  public function consultar(){
    $this->layout->content = View::make('producto.consultar');
    $this->layout->content->menu = View::make('compartidos.adminMenu');
  }
  
  public function editar(){
    $labs = Laboratorio::get();
    
    $this->layout->content = View::make('producto.editar')->withLabs($labs);
    $this->layout->content->menu = View::make('compartidos.adminMenu');
  }
  

  
  public function eliminar(){
     $this->layout->content = View::make('producto.eliminar');
    $this->layout->content->menu = View::make('compartidos.adminMenu');
  }
}