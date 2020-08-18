<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Call\Suports\Tenant;

use Call\Suports\Tenant\Facades\Tenant;
use Illuminate\Support\ServiceProvider;
use App\Tenant as SIGATenant;
use Ramsey\Uuid\Uuid;

class TenantServiceProvider extends ServiceProvider
{

    private $company;
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        if (function_exists('config_path')) {
            $this->publishes([

                realpath(__DIR__ . '/../../../config/tenant.php') => config_path('tenant.php')

            ]);
        }
        try {

            $tenant = \DB::table('tenants')->where('name', request()->getHost())->first();
            if(!$this->app->runningInConsole()){
                if (!$tenant) {

                    if(\DB::insert('insert into tenants (id, name,created_at, updated_at) values (?, ?, ?,?)', [Uuid::uuid4(), request()->getHost(),today(), today()]))
                        $tenant = \DB::table('tenants')->where('name', request()->getHost())->first();

                }
                if ($tenant) {
                    $company = SIGATenant::find($tenant->id);

                    Tenant::addTenant("tenant_id", $tenant->id);

                    if($company->companies){
                        view()->share('tenant',  $company->companies);
                    }
                }
            }
            else{
                view()->share('tenant',  $tenant);
            }

        } catch (\PDOException $th) {
            //throw $th;
            dump("Falha no tenant");
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TenantManager::class, function () {
            return new TenantManager();
        });
    }
}
