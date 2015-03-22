<?php

class Pago extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'pago';
  protected $primaryKey = 'id_pago';

    public function banco()
  {
    return $this->belongsTo('Banco', 'cod_banco');
  }
}