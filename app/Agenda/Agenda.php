<?php namespace Deportes\Agenda;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model {

    protected $table = 'agenda';
    protected $fillable = ['usuario_id','profesor_id','actividad_id','fecha'];

}
