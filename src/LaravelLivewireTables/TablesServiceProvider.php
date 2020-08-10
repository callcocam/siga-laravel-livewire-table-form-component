<?php


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
    }
}
