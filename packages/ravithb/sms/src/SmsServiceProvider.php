<?php

namespace Ravithb\Sms;

use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
 		include __DIR__.'/routes.php';
 		
 	//	include __DIR__.'/../IdeaBiz/IdeaBizAPIHandler.php';
 	
 		$this->publishes([
 				__DIR__.'/smsServiceConfig.php' => config_path('smsServiceConfig.php'),
 		]);
 		
 		$this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    	$this->app->make('Ravithb\Sms\SmsController');
    }
}
