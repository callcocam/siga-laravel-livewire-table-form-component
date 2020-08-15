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
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([MakeTable::class]);
        }
        $this->loadViewsFrom(__DIR__.'/../../resources/views/livewire/table', 'lw-tables');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/table.php');

        $this->publishes([__DIR__ . '/../../config/lw-tables.php' => config_path('lw-forms.php')], 'table-config');
        $this->publishes([__DIR__ . '/../../resources/views/livewire/table' => resource_path('views/livewire/vendor/lw-tables')], 'table-views');
    }
}
