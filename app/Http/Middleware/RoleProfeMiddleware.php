<?php namespace Deportes\Http\Middleware;

use Closure;
use Deportes\Roles\UserRole\UserRole;
use Illuminate\Support\Facades\Auth;

class RoleProfeMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if (Auth::check())
        {
            $role = UserRole::where('user_id',Auth::user()->id)->get();
            if (!$role->isEmpty() and $role[0]->role_id == 1 or $role[0]->role_id == 3)
            {
                return $next($request);
            }
            return redirect()->route('actividad.index');


        }
        return $next($request);
	}

}
