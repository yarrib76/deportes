<?php namespace Deportes\Http\Controllers\Api;

use Deportes\Http\Requests;
use Deportes\Http\Controllers\Controller;

use Deportes\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ControladorLogin extends Controller {
    public function loginUsuarios(){
        $email = Input::get('email');
        $password = Input::get('password');
        $esValido = $this->validacion($email,$password);
        return Response::json($esValido);
    }

    public function validacion($email,$password){
        $repuesta=[];
        $datos = User::where("email",$email)->first();
        if (!$datos){
            return $repuesta[0] = ['valor' => 'usr_1'];
        }else{
            if (Hash::check($password, $datos->password)){
                return $repuesta[0] = ['valor' => $datos->id];
            }
            return $repuesta[0]= ['valor' => 'pwd_1'];
        }
    }

}
