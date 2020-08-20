<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms;


use Illuminate\Support\ServiceProvider;
use Call\LaravelLivewireForms\Commands\MakeForm;

class FormServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([MakeForm::class]);
        }

        $this->loadViewsFrom(__DIR__ . config('lw-forms-config.load-views','/../../resources/views/livewire/lw-forms'), 'lw-forms-views');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/livewire/form.php');

        $this->publishes([__DIR__ . '/../../config/lw-forms-config.php' => config_path('lw-forms-config.php')], 'lw-forms-config');
        $this->publishes([__DIR__ . '/../../resources/views/livewire/lw-forms' => resource_path('views/livewire/vendor/lw-forms')], 'lw-forms-views');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/lw-forms-config.php', 'lw-forms-config');
    }
}
