<?php namespace Deportes\Pagos;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model {

    protected $table = 'pagos';
    protected $fillable = ['title','start','end','url','actividadAsignada_id','costo'];


}
