<?php

class Ciudad extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ciudad';
  protected $primaryKey = 'cod_ciudad';
  
  public function proveedor()
  {
    return $this->hasMany('Proveedor', 'cod_ciudad');
  }
  
  
  public function cliente()
  {
    return $this->hasMany('Usuario', 'cod_ciudad');
  }
 
}  