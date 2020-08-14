<?php


namespace Call\LivewireAlert;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Blade;

class LivewireAlertServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        Blade::directive('livewireAlertScripts', function () {
            return view('livewire.livewire-alert');
        });

        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../../config/livewire-alert.php', 'livewire-alert');

        // Register the main class to use with the facade
        $this->app->singleton('livewire-alert', function () {
            return new LivewireAlert;
        });
    }
}
