<?php

namespace MichaelCooke\LaravelEseye;

use Seat\Eseye\Eseye;
use Illuminate\Support\ServiceProvider;
use Seat\Eseye\Containers\EsiAuthentication;

class LaravelEseyeServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfigurations();
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigurations();

        $this->app->singleton('eseye', function($app) {
            $authentication = new EsiAuthentication([
                'client_id'     => config('eseye.client_id'),
                'secret'        => config('eseye.secret_key'),
                'refresh_token' => config('eseye.refresh_token'),
            ]);

            return new Eseye($authentication);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'eseye',
        ];
    }

    /**
     * Merge package configurations.
     *
     * @return void
     */
    public function mergeConfigurations()
    {
        $this->mergeConfigFrom(dirname(__DIR__) . '/config/eseye.php', 'eseye');
    }

    /**
     * Publish package configurations.
     *
     * @return void
     */
    public function publishConfigurations()
    {
        $this->publishes([
            dirname(__DIR__) . '/config/eseye.php' => config_path('eseye.php'),
        ]);
    }
}
