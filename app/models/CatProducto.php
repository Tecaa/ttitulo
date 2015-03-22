<?php

class CatProducto extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'cat_producto';
  protected $primaryKey = 'cod_cat_producto';

  public function producto()
  {
    return $this->belongsTo('Producto', 'codigo_producto');
  }
}
