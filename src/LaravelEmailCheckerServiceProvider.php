<?php


namespace Lukaswhite\LaravelEmailChecker;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Lukaswhite\EmailChecker\Checker;
use Lukaswhite\LaravelEmailChecker\Commands\Install;
use Lukaswhite\LaravelEmailChecker\Commands\Update;

class LaravelEmailCheckerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/email-checker.php';

        $this->publishes([
            $configPath => config_path('email-checker.php')
        ]);

        $this->mergeConfigFrom( $configPath, 'email-checker' );

        $this->commands(Install::class);
        $this->commands(Update::class);

        $this->app->singleton(Checker::class, function ($app){
            return new Checker(Storage::path(config('email-checker.directory')));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}