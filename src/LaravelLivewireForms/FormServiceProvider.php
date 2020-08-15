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

        $this->loadViewsFrom(__DIR__ . '/../../resources/views/livewire/form', 'lw-forms');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/form.php');

        $this->publishes([__DIR__ . '/../../config/lw-forms.php' => config_path('lw-forms.php')], 'form-config');
        $this->publishes([__DIR__ . '/../../resources/views/livewire/form' => resource_path('views/livewire/vendor/lw-forms')], 'form-views');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/lw-forms.php', 'lw-forms');
    }
}
