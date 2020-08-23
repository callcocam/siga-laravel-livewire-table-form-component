<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Providers;

use Call\Acl\AclServiceProvider;
use Call\Commands\MakeCrud;
use Call\Commands\MakeInstall;
use Call\Commands\MakeModel;
use Call\Commands\MakeRoute;
use Call\LaravelLivewireTables\TablesServiceProvider;
use Call\LavewireNotify\NotifyServiceProvider;
use Call\LivewireAlert\LivewireAlertServiceProvider;
use Call\MigrationsGenerator\MigrationsGeneratorServiceProvider;
use Call\Suports\Tenant\TenantServiceProvider;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as ServiceProviderAlias;
use Call\LaravelLivewireForms\FormServiceProvider;

class CallServiceProvider extends ServiceProviderAlias
{

    public function register()
    {
        $this->app->register(MigrationsGeneratorServiceProvider::class);
        if(config('lw-call.tenant', false)){
            $this->app->register(TenantServiceProvider::class);
        }

        $this->app->register(AclServiceProvider::class);
        $this->app->register(FormServiceProvider::class);
        $this->app->register(TablesServiceProvider::class);
        $this->app->register(NotifyServiceProvider::class);
        $this->app->register(LivewireAlertServiceProvider::class);
    }

    public function boot(){

        $this->mergeConfigFrom(__DIR__ . '/../../config/lw-call.php', 'lw-call');

        $this->loadViewsFrom(__DIR__.'/../../resources/views','lw-call-views');

        $this->mapMenus();
        $this->loadPublish();
        $this->installScaffolding();
        if ($this->app->runningInConsole()) {
            $this->commands([MakeInstall::class]);
            $this->commands([MakeCrud::class]);
            $this->commands([MakeRoute::class]);
            $this->commands([MakeModel::class]);
        }
    }

    protected $dependencies;
    protected function mapMenus(){

        collect(glob(app_path('Http/Livewire/Menus/*.php')))
            ->each(function($path) {
                $fileName = File::name($path);
                $menus = app(sprintf("\\App\\Http\\Livewire\\Menus\\%s", $fileName))->getMenus();
                $this->dependencies[] = $menus;
            });

        view()->share('menus',   collect($this->dependencies)->sortBy(function ($dependency){
            return $dependency->sorting;
        }));
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace("App\Http\Controllers")
            ->group( __DIR__.'/../../routes/web.php');
    }

    protected function loadPublish(){

        $this->publishes([
            __DIR__.'/../../config/lw-call.php' => config_path('lw-call.php'),
        ], 'lw-call');

        $this->publishes([
            __DIR__.'/../../resources' => resource_path()
        ],'lw-call-views');


        $this->publishes([
            __DIR__.'/../../resources/sass' => resource_path("sass")
        ],'lw-call-views-sass');

        $this->publishes([
            __DIR__.'/../../resources/js' => resource_path("js")
        ],'lw-call-views-js');

        $this->publishes([
            __DIR__.'/../../package.json' => base_path('package.json')
        ],'lw-call-package');

        $this->publishes([
            __DIR__.'/../../dist-assets' => public_path('dist-assets'),
        ], 'lw-call-assets');

        $this->publishes([
            __DIR__.'/../../routes/livewire' => base_path('routes/livewire'),
        ], 'lw-call-routes');

        $this->publishMigrations();
    }

    /**
     * Publish the migration files.
     *
     * @return void
     */
    protected function installScaffolding()
    {
        $this->publishes([
            __DIR__.'/../../scaffolding/' => app_path(),
        ], 'lw-call-scaffolding');
    }
    /**
     * Publish the migration files.
     *
     * @return void
     */
    protected function publishMigrations()
    {
        $this->publishes([
            __DIR__.'/../../database/' => database_path(),
        ], 'lw-call-migrations');
    }
}
