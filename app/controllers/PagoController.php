<?php

class PagoController extends BaseController {
  protected $layout = "layouts.admin";

    public function pago(){
     View::share('titulo', "Pagar venta");
    $this->layout->content = View::make('pago.pago')->withBanco('$banco');
  }
  
  public function crear(){
    View::share('titulo', "Crear Pago");
    $pago = new Pago();
    $pago->cod_banco = Input::get('cod');
    $pago->cod_documento = Input::get('');
    $pago->fecha_pago = Input::get('fecha');
    $pago->monto = Input::get('monto');
    $pago->tipo_pago = Input::get('tipo');
    $pago->save();
  }
  
  
}