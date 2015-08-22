<?php namespace Deportes\Http\Middleware;

use Closure;
use Deportes\Roles\UserRole\UserRole;
use Illuminate\Support\Facades\Auth;

class RoleAlumnoMiddleware {

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
            if ($role[0]->role_id == 2)
            {
                return $next($request);
            }
            return view ('partials.errors.role');
        }
        return $next($request);
    }

}
