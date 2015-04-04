<?php

class Factura extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
  protected $table = 'factura';
  protected $primaryKey = 'cod_documento';


  public function laboratorio()
  {
    return $this->belongsTo('Laboratorio', 'cod_laboratorio');
  }

  public function detallefac()
  {
    return $this->belongsTo('DetalleFac', 'cod_documento');
  }
  
  public function proveedor()
    {
    return $this->belongsTo('Proveedor', 'cod_proveedor');
  }

}
