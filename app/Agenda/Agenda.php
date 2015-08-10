<?php namespace Deportes\Agenda;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model {

    protected $table = 'agenda';
    protected $fillable = ['title','start','end','url','actividadAsignada_id'];

    public function actividadesAsignadas(){
        return $this->belongsTo('Deportes\ActividadesAsignadas\Actividades_Asignadas', 'actividadAsignada_id');
    }
}
