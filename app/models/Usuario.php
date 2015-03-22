<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuario';
  protected $primaryKey = 'rut';
  
   public function ciudad()
  {
    return $this->belongsTo('Ciudad', 'cod_ciudad');
  }
 	protected $hidden = array('contrasena');
  
  public function getAuthPassword() {
    return $this->contrasena;
  }
}  