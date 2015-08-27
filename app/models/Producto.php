<?php

class Producto extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'producto';
  protected $primaryKey = 'codigo_producto';
  protected $appends = array('precioCompraF', 'precioVentaF', 'precioVentaOfertaF', 'precioVentaFinal', 'precioVentaFinalF', 'cantidadPublico', 'encargadosF',
                             'tamanoEuropeo');
  
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
  public function getTamanoEuropeoAttribute()
  {
    switch ($this->contenido)
    {
      case "6":
        return 12;
      break;
      case "7":
        return 15;
      break;
      case "8":
        return 17;
      break;
      case "9":
        return 19;
      break;
      case "10":
        return 21;
      break;
      default:
        return $this->contenido;
      break;
    }
  }
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

}
