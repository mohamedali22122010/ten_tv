<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale') && array_key_exists(Session::get('locale'), config('laravel-translatable.languages'))) {
            App::setLocale(Session::get('locale'));
        }
        else if($request->hasCookie('locale') && array_key_exists($request->cookie('locale'), config('laravel-translatable.languages'))) {
            App::setLocale($request->cookie('locale'));
        }
        else{
            App::setLocale('ar');
        }

        return $next($request);
    }
}
