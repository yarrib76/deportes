<?php namespace Deportes\Agenda;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model {

    protected $table = 'agenda';
    protected $fillable = ['title','start','end','url'];

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
