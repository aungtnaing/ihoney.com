<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    public function boot()
    {
        //
        View::composer('app', function($view){
    		$view->with('foo', 'bar');
		});
    }


    public function register()
    {
        //
    }
}