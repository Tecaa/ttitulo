<?php

class BoletaController extends BaseController {
  protected $layout = "layouts.admin";
  
  public function __construct()
  {
  }
  
  public function ventaLocal(){
    View::share('titulo', "Realizar Venta");
    JavaScript::put([
      'productos' => Producto::where('activo', true)->with('proveedor')->with('catProducto')->get()
    ]);
    $this->layout->content = View::make('boleta.ventaLocal');
  }

  public function crearboleta(){
    View::share('titulo', "Compra");
    $productos = json_decode(Input::get('productos'));

    $documento = new Documento();
    $documento->rut = Auth::user()->rut;
    $documento->tipo_documento = 'boleta';

    $total = 0;
    $precio_total = 0;
    foreach ($productos as $detBoleta)
    {
      $total = $total+ intval($detBoleta->cantidadVendida); 
      $precio_total = intval($precio_total + $detBoleta->subtotal);
      
      $prod = Producto::find(intval($detBoleta->codigo_producto));  
      if ($prod->cantidadPublico < intval($detBoleta->cantidadVendida))
      {
        return 'Insuficiente stock de: ' + $prod->nombre_producto;
      }
    }

    $documento->precio_total = $precio_total;
    $documento->cantidad_total = $total;
    
    
    foreach($productos as $det)
    {
      $prod = Producto::find(intval($det->codigo_producto)); 
      $prod->cantidad = $prod->cantidad - intval($det->cantidadVendida);
      $prod->save();
    }
    $documento->save();

    $boleta = new Boleta();
    $boleta->cod_documento = $documento->cod_documento;
    if (Input::get('rutCliente') != "")
      $boleta->rut = Input::get('rutCliente');
    $boleta->save();


    foreach ($productos as $prodVendido)
    {
      $detboleta = new DetalleBoleta();
      $detboleta->cod_documento = $documento->cod_documento;
      $detboleta->codigo_producto = intval ($prodVendido->codigo_producto);
      $detboleta->cantidad = intval( $prodVendido->cantidadVendida);
      $detboleta->precio_venta = intval ($prodVendido->precioVentaFinal);
      $detboleta->precio_compra = intval ($prodVendido->precio_compra);
      $detboleta->save();
    }

    return Redirect::to('/listado/compras');
  }

  public function ventaInternet($cod_documento){
    $bancos = Banco::get();
    $documento = Documento::find($cod_documento);
    View::share('titulo', "Realizar Venta");
    $this->layout->content = View::make('boleta.ventaInternet')->withBancos($bancos)->withDocumento($documento);
     
    $detalles = DetalleBoleta::where('cod_documento', '=', $cod_documento);
     JavaScript::put([
        'detalles' => $detalles->with("producto")->with("producto.proveedor")->get(),
    ]);
  }
/*
  public function ordenCompra(){
    View::share('titulo', "Orden de compra");
    $this->layout->content = View::make('boleta.ordenCompra');
  }*/  
  public function crearPedido()
  {
    $productos = json_decode(Input::get('productos'));
    $metodo = MetodoEnvio::find(Input::get('cod_metodo'));
    
    $documento = new Documento();
    $documento->tipo_documento = 'pedido';


    $total = 0;
    $precio_total = 0;
    foreach ($productos as $detBoleta)
    {
      $total = $total+ intval($detBoleta->cantidadComprada); 
      $p = Producto::where('codigo_barras', '=', $detBoleta->codigo_barras)->first();
      $precio_total = $precio_total + $p->precioVentaFinal *intval($detBoleta->cantidadComprada);
      if ($p->cantidadPublico < intval($detBoleta->cantidadComprada))
      {
        return 'Insuficiente stock de: ' + $prod->nombre_producto;
      }
    }
    
    
    

    $documento->precio_total = $precio_total + $metodo->costo;
    $documento->cantidad_total = $total;
    $documento->save();

    $boleta = new Boleta();
    $boleta->cod_documento = $documento->cod_documento;
    $boleta->metodo_nombre = $metodo->nombre;
    $boleta->metodo_costo = $metodo->costo;
    $boleta->rut = Auth::user()->rut;
    $boleta->save();

    foreach ($productos as $prodVendido)
    {
      $p = Producto::where('codigo_barras', '=', $prodVendido->codigo_barras)->first();
      $detboleta = new DetalleBoleta();
      $detboleta->cod_documento = $documento->cod_documento;
      $detboleta->codigo_producto = intval ($p->codigo_producto);
      $detboleta->cantidad = intval( $prodVendido->cantidadComprada);
      $detboleta->precio_compra = $p->precio_compra;
      $detboleta->precio_venta = $p->precioVentaFinal;
      $detboleta->save();
    
    }
     return 'true';
     
    
  }
  public function aceptarPedido($cod_documento)
  {
    $pago = new Pago();
    $pago->fecha_pago = Input::get('fecha');
    $pago->hora_pago = Input::get('hora');
    $pago->monto = Input::get('monto');
    $pago->tipo_pago = Input::get('tipo_pago');
    $pago->cod_banco = Input::get('banco');
    $pago->cod_documento = Input::get('cod_documento');
    
     View::share('titulo', "Aceptando pedido");
    $documento = Documento::find($cod_documento);
    
    $documento->tipo_documento = 'aceptado';
    foreach($documento->detalles as $det)
    {
      $prod = Producto::find($det->codigo_producto);  
      if ($prod->cantidad - $det->cantidad < 0)
      {
        return 'Insuficiente stock de: ' + $prod->nombre_producto;
      }
    }
    
    foreach($documento->detalles as $det)
    {
      $prod = Producto::find($det->codigo_producto);  
      if ($prod->cantidad - $det->cantidad >= 0)
      {
        $prod->cantidad = $prod->cantidad - $det->cantidad;
        $prod->save();
      }
    }
    $documento->save();
    $pago->save();
    return Redirect::to('/listado/pedidos');
  }
  public function rechazarPedido($cod_documento)
  {
    $documento = Documento::find($cod_documento);
    $documento->tipo_documento = 'rechazado';
    $documento->save();
    return Redirect::to('/listado/pedidos');
  }
  public function pedido($cod_documento)
  {
    View::share('titulo', "Detalle del pedido");
    $detalles = DetalleBoleta::where('cod_documento', '=', $cod_documento);
    $this->layout->content = View::make('boleta.pedido')->withDocumento(Documento::find($cod_documento));
    JavaScript::put([
      'detalles' => $detalles->with("producto")->with("producto.proveedor")->get(),
      'envio' => Documento::find($cod_documento)->boleta->metodo_costo
    ]);
  }
  public function historial(){
    View::share('titulo', "Historial de ventas");
    $this->layout->content = View::make('boleta.historial');
    JavaScript::put([
      'boletas' => Documento::where('tipo_documento','=', 'boleta')->orWhere('tipo_documento', 'aceptado')->orWhere('tipo_documento', 'rechazado')
      ->with('boleta')->with('boleta.cliente')->get()
    ]);
  }
  public function detalle($cod_documento)
  {
    View::share('titulo', "Detalle del pedido");
    $detalles = DetalleBoleta::where('cod_documento', '=', $cod_documento);
    $this->layout->content = View::make('boleta.detalle')->withDocumento(Documento::find($cod_documento));
    JavaScript::put([
      'detalles' => $detalles->with("producto")->with("producto.proveedor")->get(),
      'envio' => (Documento::find($cod_documento)->boleta->metodo_costo != null) ? Documento::find($cod_documento)->boleta->metodo_costo : 0
    ]);
  }
}  