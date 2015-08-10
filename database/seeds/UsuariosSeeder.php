<?php

use Laracasts\TestDummy\Factory;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder{

    public function __construct (){

        $this->table = 'users';
    }
    public function run(){
        DB::table($this->table)->delete();

        $this->crearUsuario('yarrib76@gmail.com','Yamil');
        $this->crearUsuario('aldana@demo.com','Aldana');
    }

    private function crearUsuario($correo,  $nombre)
    {
        return $usuario = Factory::create('usuario', [
            'email' => $correo,
            'name' => $nombre
        ]);
    }

}