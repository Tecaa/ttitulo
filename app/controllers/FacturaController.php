<?php

class FacturaController extends BaseController {
  protected $layout = "layouts.admin";

  public function factura(){
    View::share('titulo', "Ingresar Compra");
    $proveedores = Proveedor::get();
    $this->layout->content = View::make('facturas.factura')->withProveedores($proveedores);
  }

  public function crearFactura(){


    View::share('titulo', "Compra");
    $productos = Input::get('productos');

    $documento = new Documento();
    $documento->rut = Auth::user()->rut;
    $documento->tipo_documento = 'factura';


    $total = 0;
    $precio_total = 0;
    foreach ($productos as $detFactura)
    {
      $total = $total+ $detFactura["cantidadComprada"]; 
      $precio_total = $precio_total + $detFactura["subtotal"];
    }

    $documento->precio_total = $precio_total;
    $documento->cantidad_total = $total;
    $documento->save();


    $factura = new Factura();
    $factura->cod_documento = $documento->cod_documento;
    $factura->cod_proveedor = Input::get('cod_proveedor');
    $factura->cod_factura = Input::get('codFactura');
    $factura->save();



    foreach ($productos as $prodComprado)
    {
      $detfactura = new DetalleFac();
      $detfactura->cod_documento = $documento->cod_documento;
      $detfactura->codigo_producto = intval ($prodComprado["codigo_producto"]);
      $detfactura->cantidad = intval( $prodComprado["cantidadComprada"]);
      $detfactura->precio_compra = intval ($prodComprado["precio_compra"]);


      $producto = Producto::find($detfactura->codigo_producto);
      $producto->cantidad = $producto->cantidad + $detfactura->cantidad;
      $producto->precio_compra = intval ($prodComprado["precio_compra"]);
      $producto->precio_venta = intval ($prodComprado["precio_venta"]);
      if ($prodComprado["precio_venta_oferta"] != null)
        $producto->precio_venta_oferta = intval ($prodComprado["precio_venta_oferta"]);
      else 
        $producto->precio_venta_oferta = null;
      $producto->ultima_compra = $producto->cantidad;
      if ($producto->cantidad >= 0){
        $producto->save();
        $detfactura->save();
      } 
    }

    return Redirect::to('/listado/compras'); 
  }
  public function detalle($cod_documento)
  {
    View::share('titulo', "Detalle de la factura");
    $detalles = DetalleFac::where('cod_documento', '=', $cod_documento);
    $this->layout->content = View::make('facturas.detalle')->withDocumento(Documento::find($cod_documento));
    JavaScript::put([
      'detalles' => $detalles->with("producto")->with("producto.proveedor")->get()
    ]);
  }
}