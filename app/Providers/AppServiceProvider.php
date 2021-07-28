<?php

namespace App\Providers;

use App\Composer\ViewComposer;
use App\Http\ViewComposer\GlobalVariable;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    public function boot()
    {
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        Paginator::useBootstrap();
        Blade::include('components.textarea','textarea');
        Blade::include('components.input','input');
        Blade::include('components.select','select');
        Blade::include('components.search','search');
        View::composer(['frontend.index','frontend.master','frontend._layouts'],ViewComposer::class);


//
    }
}
