<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace Call\MigrationsGenerator\Seed;

use Illuminate\Support\ServiceProvider;
use Call\MigrationsGenerator\Seed\Commands\IseedCommand;

class IseedServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerResources();

        $this->app->singleton('iseed', function($app) {
            return new Iseed;
        });

        $this->app->booting(function() {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Iseed', 'Call\Seed\Facades\Iseed');
        });

        $this->app->singleton('command.iseed', function($app) {
            return new IseedCommand;
        });

        $this->commands('command.iseed');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('iseed');
    }

    /**
     * Register the package resources.
     *
     * @return void
     */
    protected function registerResources()
    {

    }
}
