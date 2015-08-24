<?php

class Boleta extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'boleta';
  protected $primaryKey = 'cod_documento';
    protected $appends = array('metodoCostoF');
  
  public function detalle_boleta()
  {
    return $this->hasMany('DetalleBoleta', 'cod_documento');
  }
  /*
  public function metodoEnvio()
  {
      return $this->belongsTo('MetodoEnvio', 'cod_metodo');  
  }*/
  public function cliente()
  {
      return $this->belongsTo('Usuario', 'rut_cliente', 'rut');  
  }

  public function getMetodoCostoFAttribute()
  {
    return "$ ". number_format($this->metodo_costo, 0, ",", ".");
  }
  
}
