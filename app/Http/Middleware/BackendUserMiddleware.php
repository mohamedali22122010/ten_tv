<?php namespace App\Http\Middleware;

use Closure;

class BackendUserMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if(in_array(auth()->user()->role_id, [1,2,3,4,5]) && auth()->user()->status == 1 && auth()->user()->confirmed == 1)
        {
	        return $next($request);
        }
		
		return redirect('/');
    }

}
