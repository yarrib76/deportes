<?php namespace Deportes\ActividadesAsignadas;

use Illuminate\Database\Eloquent\Model;

class Actividades_Asignadas extends Model {

    protected $table = 'actividades_asignadas';
    protected $fillable = ['fecha','costo','usuario_id','profesor_id','actividad_id'];

    public function actividad(){
        return $this->belongsTo('Deportes\Actividades\Actividad', 'actividad_id');
    }

    public function profesor(){
        return $this->belongsTo('Deportes\Profesores\Profesor', 'profesor_id');

    }

    public function usuario(){
        return $this->belongsTo('Deportes\User', 'usuario_id');

    }
}
