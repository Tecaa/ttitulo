<?php

class MetodoEnvio extends Eloquent {

  /**
	 * The database table used by the model.
	 * @var string
	 */
  protected $table = 'metodos_envio';
  protected $primaryKey = 'cod_metodo';


  protected $appends = array('costoF');

  public function getCostoFAttribute()
  {
    return "$ ". number_format($this->costo, 0, ",", ".");
  }
  /*
    public function boleta()
  {
    return $this->hasMany('Boleta', 'cod_metodo');
  }*/
}