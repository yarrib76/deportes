<?php namespace Deportes\Handlers\Events;

use Deportes\Usuarios\TrackLogin;
use Faker\Provider\DateTime;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Support\Facades\Auth;

class trackUserLogin {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  Events  $event
	 * @return void
	 */
	public function handle(Events $event)
	{
		//
	}

    /**
     * Guardo el Track del login de los usuarios
     */
    public function onUserLogin(){
        TrackLogin::create([
            'ultimo_login' => date('Y-m-d H:i:s'),
            'user_id' => Auth::user()->id,
        ]);
    }
}
