<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Providers;

use Call\Commands\MakeCrud;
use Call\Commands\MakeRoue;
use Call\LaravelLivewireTables\TablesServiceProvider;
use Call\LivewireAlert\LivewireAlertServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as ServiceProviderAlias;
use Call\LaravelLivewireForms\FormServiceProvider;

class CallServiceProvider extends ServiceProviderAlias
{

    public function register()
    {
        $this->app->register(FormServiceProvider::class);
        $this->app->register(TablesServiceProvider::class);
        $this->app->register(LivewireAlertServiceProvider::class);
    }

    public function boot(){
        $this->mapWebRoutes();
        $this->mapDynamicWebRoutes();
        $this->loadPublishs();
        if ($this->app->runningInConsole()) {
            $this->commands([MakeCrud::class]);
            $this->commands([MakeRoue::class]);
        }
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace("App\Http\Controllers")
            ->group( __DIR__.'/../../routes/call.php');
    }
    protected function mapDynamicWebRoutes()
    {
        Route::middleware('web')
            ->group(function (){
                collect(glob(app_path('Http/Livewire/routes/*.php')))
                    ->each(function($path) {
                        require $path;
                    });
            });

    }


    protected function loadPublishs(){

        $this->publishes([
            __DIR__.'/../../config/call.php' => config_path('call.php'),
        ]);

        $this->publishes([
            __DIR__.'/../../resources' => resource_path(),
        ]);

        $this->publishes([
            __DIR__.'/../../package.json' => base_path('package.json'),
        ]);

    }
}
