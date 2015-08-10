<?php

use Illuminate\Support\Facades\DB;
use Laracasts\TestDummy\Factory;
use Illuminate\Database\Seeder;

class ProfesoresSeeder extends Seeder{

    public function __construct (){

        $this->table = 'profesores';
    }
    public function run(){
        DB::table($this->table)->delete();

       // $this->crearProfesor('Daniel','Halt');
       // $this->crearProfesor('Sancho','Panza');
       Factory::create('profesores');
       Factory::create('profesores');
    }

    private function crearProfesor($nombre,  $apellido)
    {
        return $profesor = Factory::create('profesores', [
            'nombre' => $nombre,
            'apellido' => $apellido
        ]);
    }

}