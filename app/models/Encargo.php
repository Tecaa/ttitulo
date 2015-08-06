<?php

class Encargo extends Eloquent {

	/**
	 * The database table used by the model.
	 * @var string
	 */
	protected $table = 'encargos';
  protected $primaryKey = 'cod_encargo';

    protected $appends = array('fechaEncargoF');
  
public function producto()
  {
    return $this->belongsTo('Producto', 'cod_producto', 'codigo_producto');
  }
  public function cliente()
  {
    return $this->belongsTo('Usuario', 'rut');
  }
  public function vendedor()
  {
    return $this->belongsTo('Usuario', 'rut_vendedor');
  }
  public function boleta()
  {
    return $this->belongsTo('Boleta', 'cod_boleta');
  }
  public function getFechaEncargoFAttribute()
  { 
    return date('d/m/Y', strtotime($this->fecha_encargo));
  }
}