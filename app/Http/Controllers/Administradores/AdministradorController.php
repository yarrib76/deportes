<?php namespace Deportes\Http\Controllers\Administradores;

use Deportes\Http\Requests;
use Deportes\Http\Controllers\Controller;

use Deportes\User;
use Deportes\Usuarios\TrackLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role.admin');
    }

    public function trackLogins(){
       // $usuarios = User::lists('id','name');
        $trackLogins = TrackLogin::all()->load('usuario');
        return view('Administrador.reporte', compact('trackLogins'));
	}

    public function borrarLogins(){
        db::table('track_user_login')->delete();
        return redirect()->route('administrador.tracklogins');
    }
}
