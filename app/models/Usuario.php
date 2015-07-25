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
    protected $appends = array('edad', 'fechaNacimientoF');

  public function ciudad()
  {
    return $this->belongsTo('Ciudad', 'cod_ciudad');
  }
  public function boleta()
    {
    return $this->hasMany("Boleta", 'rut');
  }
  
  protected $hidden = array('contrasena');

  public function getAuthPassword() {
    return $this->contrasena;
  }

  public function getEdadAttribute()
  { 
/*
    $birthDate = explode("/", $birthDate);
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[0], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));
    echo "Age is:" . $age;*/
    $date = new DateTime($this->fecha_nacimiento);
    $now = new DateTime();
    $interval = $now->diff($date);
    return $interval->y;
  }
    public function getFechaNacimientoFAttribute()
  { 
    return date('d/m/Y', strtotime($this->fecha_nacimiento));
  }
}  