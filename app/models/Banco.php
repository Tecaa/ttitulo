<?php

class Banco extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'banco';
  protected $primaryKey = 'cod_banco';


   public function pago()
  {
    return $this->hasMany('Pago', 'cod_ banco');
  }
}