<?php

namespace MichaelCooke\LaravelEseye;

use Monolog\Logger;
use Seat\Eseye\Eseye;
use Seat\Eseye\Configuration;
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

            $configuration = Configuration::getInstance();

            $configuration->datasource = config('eseye.datasource');

            $configuration->logger           = 'Seat\\Eseye\\Log\\' . ucfirst(config('eseye.logger')) . 'Logger';
            $configuration->logger_level     = config('eseye.logger_level');
            $configuration->logfile_location = config('eseye.logfile_location');

            $configuration->cache = 'Seat\\Eseye\\Cache\\' . ucfirst(config('eseye.cache')) . 'Cache';

            $configuration->file_cache_location = config('eseye.file_cache_location');

            $configuration->redis_cache_location = 'tcp://' . config('eseye.redis_cache_location');
            $configuration->redis_cache_prefix   = config('eseye.redis_cache_prefix');

            $configuration->memcached_cache_host = config('eseye.memcached_cache_host');
            $configuration->memcached_cache_host = config('eseye.memcached_cache_port');
            $configuration->memcached_cache_host = config('eseye.memcached_cache_prefix');
            $configuration->memcached_cache_host = config('eseye.memcached_cache_compressed');

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
