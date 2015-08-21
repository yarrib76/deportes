<?php namespace Deportes\Http\Middleware;

use Closure;
use Deportes\Roles\UserRole\UserRole;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware {

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
            switch ($role[0]->role_id){
                case 1:
                    return redirect()->route('invitados.index');
                case 2:
                    return $next($request);
            }
          //  return $next($request);
        }
        return $next($request);
	}

}
