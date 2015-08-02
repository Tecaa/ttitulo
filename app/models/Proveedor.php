<?php

class Proveedor extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'proveedores';
  protected $primaryKey = 'cod_proveedor';
  
   public function ciudad()
  {
    return $this->belongsTo('Ciudad', 'cod_ciudad');
  }
 
  
  public function productos()
  {
    return $this->hasMany('Producto', 'cod_laboratorio');
  }
  
}  