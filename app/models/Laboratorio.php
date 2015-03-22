<?php

class Laboratorio extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
  protected $table = 'laboratorio';
  protected $primaryKey = 'cod_laboratorio';
  
  public function productos()
  {
    return $this->hasMany('Producto', 'cod_laboratorio');
  }
  
    public function factura()
  {
    return $this->hasMany('Factura', 'cod_laboratorio');
  }
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}