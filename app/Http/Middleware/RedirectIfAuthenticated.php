<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(auth()->user()->role_id == 4) // this mean regular user
	        {
	            return redirect()->back();
	        }
			if(in_array(auth()->user()->role_id, [1,2,3])) // this mean admin user
	        {
	            return redirect()->to('/backend');
	        }
			return redirect()->to('/');
        }

        return $next($request);
    }
}
