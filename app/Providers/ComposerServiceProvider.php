<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App;
use App\Page;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontend.__partials.footer', function ($view) {
	        $pages = Page::select('title','slug')->approved()->get();
            $view->with('pages', $pages);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
