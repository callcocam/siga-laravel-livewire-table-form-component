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
        $this->loadViewsFrom(__DIR__ . config('lw-alert-config.load-views','/../../resources/views/livewire/alert'), 'lw-alert-views');

        $this->publishes([__DIR__ . '/../../config/lw-alert-config.php' => config_path('lw-forms-config.php')], 'lw-alert-config');
        $this->publishes([__DIR__ . '/../../resources/views/livewire/lw-alert' => resource_path('views/livewire/vendor/lw-alert')], 'lw-alert-views');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        Blade::directive('livewireAlert', function () {
            return view(alert_views('messages'));
        });
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../../config/lw-alert-config.php', 'lw-alert-config');

    }
}
