<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireTables;


use Call\LaravelLivewireTables\Commands\MakeTable;
use Illuminate\Support\ServiceProvider;

class TablesServiceProvider extends ServiceProvider
{


    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/lw-tables-config.php', 'lw-tables-config');
    }

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([MakeTable::class]);
        }
        $this->loadViewsFrom(__DIR__.config('lw-tables-config.load-views','/../../resources/views/livewire/lw-tables'), 'lw-tables-views');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/livewire/table.php');

        $this->publishes([__DIR__ . '/../../config/lw-tables-config.php' => config_path('lw-tables-config.php')], 'lw-tables-config');
        $this->publishes([__DIR__ . '/../../resources/views/livewire/lw-tables' => resource_path('views/livewire/vendor/lw-tables')], 'lw-tables-views');

    }
}
