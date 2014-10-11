<?php

class Producto extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'producto';
  protected $primaryKey = 'codigo_producto';
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}
