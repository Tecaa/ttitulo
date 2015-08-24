<?php

class Ajuste extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'ajuste';
  protected $primaryKey = 'cod_ajuste';

  
  public function producto()
  {
    return $this->belongsTo('Producto', 'codigo_producto');
  }
  public function usuario()
  {
    return $this->belongsTo('Usuario', 'usuario_id');
  }
}