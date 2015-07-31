<?php
namespace Deportes\Actividades;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model{

    protected $table = 'actividades';
    protected $fillable = ['nombre','descripcion'];
}