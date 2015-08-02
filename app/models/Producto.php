<?php

class Producto extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'producto';
  protected $primaryKey = 'codigo_producto';
  protected $appends = array('precioCompraF', 'precioVentaF');
  
  public function proveedor()
  {
    return $this->belongsTo('Proveedor', 'cod_proveedor');
  }
  
  public function catProducto()
  {
    return $this->hasMany('CatProducto', 'codigo_producto');
  }

  public function imagen360()
  {
    return $this->hasOne('Imagen360', 'codigo_producto');
  }
  
  public function getPrecioCompraFAttribute()
  {
    return "$ ". number_format($this->precio_compra, 0, ",", ".");
  }
  
  public function getPrecioVentaFAttribute()
  {
    return "$ ". number_format($this->precio_venta, 0, ",", ".");
  }
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}
