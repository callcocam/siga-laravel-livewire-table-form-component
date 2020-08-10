<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Providers;

use Call\LaravelLivewireTables\TablesServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as ServiceProviderAlias;
use Call\LaravelLivewireForms\FormServiceProvider;

class CallServiceProvider extends ServiceProviderAlias
{

    public function register()
    {

        $this->app->register(FormServiceProvider::class);
        $this->app->register(TablesServiceProvider::class);
    }

    public function boot(){

        $this->mapWebRoutes();
        $this->loadPublishs();


    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace("App\Http\Controllers")
            ->group(base_path('packages/callcocam/routes/call.php'));
    }


    protected function loadPublishs(){

        $this->publishes([
            __DIR__.'/../config/call.php' => config_path('call.php'),
        ]);

        $this->publishes([
            __DIR__.'/../resources' => resource_path(),
        ]);

        $this->publishes([
            __DIR__.'/package.json' => base_path('package.json'),
        ]);

    }
}
