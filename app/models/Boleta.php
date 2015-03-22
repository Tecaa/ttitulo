<?php

class Boleta extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'boleta';
  protected $primaryKey = 'cod_documento';
  
  public function detalle_boleta()
  {
    return $this->hasMany('DetalleBoleta', 'cod_documento');
  }

}
