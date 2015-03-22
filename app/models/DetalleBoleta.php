<?php

class DetalleBoleta extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'detalle_boleta';
  protected $primaryKey = 'cod_detalle_bol';
  
   public function documento()
  {
    return $this->belongsTo('Documento', 'cod_documento');
  }
   public function boleta()
  {
    return $this->belongsTo('Boleta', 'cod_documento');
  }
  public function producto()
  {
    return $this->belongsTo('Producto', 'codigo_producto');
  }
}