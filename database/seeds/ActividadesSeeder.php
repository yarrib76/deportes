<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Laracasts\TestDummy\Factory;

class ActividadesSeeder extends Seeder{


    function __construct()
    {
        $this->table = 'actividades';
    }

    public function run(){
        DB::table($this->table)->delete();

      //  $this->crearActividad('Tenis Individual','Club Italiano');
      //  $this->crearActividad('Tenis Grupal X2','Club Italiano');
      //  $this->crearActividad('Boxeo','Relampago Team');
        Factory::create('actividades');
        Factory::create('actividades');
    }

    private function crearActividad($nombre,  $club)
    {
        return $actividad = Factory::create('actividades', [
            'nombre' => $nombre,
            'club' => $club
        ]);
    }
}