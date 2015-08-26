<?php namespace Deportes\Profesores;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profesor extends Model {
    use SoftDeletes;

    protected $table = 'profesores';
    protected $fillable = ['nombre','apellido','actividad_id','deleted_at','movil','usuario_id'];
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function actividad(){

        return $this->belongsTo('Deportes\Actividades\Actividad', 'actividad_id');
    }

    public function usuario(){

        return $this->belongsTo('Deportes\User', 'usuario_id');
    }
}
