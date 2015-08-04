<?php namespace Deportes\Profesores;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model {

    protected $table = 'profesores';
    protected $fillable = ['nombre','apellido','actividad_id'];

    public function actividad(){

        return $this->belongsTo('Deportes\Actividades\Actividad', 'actividad_id');
    }
}
