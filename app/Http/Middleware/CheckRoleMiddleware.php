<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Carbon\Carbon;

class CheckRoleMiddleware {

	protected $auth;

	/**
	 * Creates a new instance of the middleware.
	 *
	 * @param Guard $auth
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  Closure $next
	 * @param  $permissions
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		config(['backend_timezone'=>true]);
		Carbon::setLocale(config('app.locale'));
		if($request->user()->role_id == 1){ // this for super admin user
			return $next($request);
		}
		if($request->user()->role_id == 0){ // this for front user
			auth()->logout();
			abort(401);
		}
		// not run now
		$action = $request->route()->getName();
		if ($this->auth->guest() || !$request->user()->can($action)) {
			if($request->is('backend') || $request->is('backend/*')){
				return response()->view('backend.errors.401',['message'=>trans('auth.Unauthenticated')]);
			}
			abort(401);
		}

		return $next($request);
	}

}
