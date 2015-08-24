<?php

class Documento extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'documento';
  protected $primaryKey = 'cod_documento';
    protected $appends = array('precioTotalF');
  
  public function detalles()
  {
    return $this->hasMany('DetalleBoleta', 'cod_documento');
  }

    public function detallefac()
  {
    return $this->hasMany('DetalleFac', 'cod_documento');
  }
  
  public function boleta()
    {
    return $this->hasOne('Boleta', 'cod_documento');
  }
   public function factura()
    {
    return $this->hasOne('Factura', 'cod_documento');
  }
  
  public function vendedor()
    {
    
    return $this->belongsTo('Usuario', 'vendedor_id', 'usuario_id');
  }
  

  public function getPrecioTotalFAttribute()
  {
    return "$ ". number_format($this->precio_total, 0, ",", ".");
  }
}