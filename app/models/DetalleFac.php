<?php

class DetalleFac extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'detalle_factura';
  protected $primaryKey = 'cod_detalle_fac';
  

  public function documento()
  {
    return $this->belongsTo('Documento', 'cod_documento');
  }

  public function factura()
  {
    return $this->belongsTo('Factura', 'cod_documento');
  }
  public function producto()
  {
    return $this->belongsTo('Producto', 'codigo_producto');
  }
}