<?php

class Producto extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'producto';
  protected $primaryKey = 'codigo_producto';
  protected $appends = array('precioCompraF', 'precioVentaF', 'precioVentaOfertaF', 'precioVentaFinal', 'precioVentaFinalF', 'cantidadPublico', 'encargadosF');
  
  protected $hidden = array('imagen', 'imagen_low');
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
  
  public function getPrecioVentaOfertaFAttribute()
  {
    return "$ ". number_format($this->precio_venta_oferta, 0, ",", ".");
  }
  
  public function getPrecioVentaFinalAttribute()
  {
    if ($this->precio_venta_oferta == null)
      return $this->precio_venta;
    else
      return $this->precio_venta_oferta;
  }
  public function getPrecioVentaFinalFAttribute()
  {
    return "$ ". number_format($this->precioVentaFinal, 0, ",", ".");
  }
  
  public function getCantidadPublicoAttribute()
  {
    return ($this->cantidad - $this->encargados);
  }
  public function getEncargadosFAttribute()
  {
    if ($this->encargados == 0)
      return "";
    return $this->encargados;
  }
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}
