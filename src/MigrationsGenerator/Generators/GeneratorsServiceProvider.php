<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace Call\MigrationsGenerator\Generators;

use Illuminate\Support\ServiceProvider;

class GeneratorsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


    /**
     * Booting
     */
    public function boot()
    {

    }

	/**
	 * Register the commands
	 *
	 * @return void
	 */
	public function register()
	{
        foreach([
            'Model',
            'View',
            'Controller',
            'Migration',
            'Seeder',
            'Pivot',
            'Resource',
            'Scaffold',
            'Publisher'] as $command)
        {
            $this->{"register$command"}();
        }
	}

    /**
     * Register the model generator
     */
    protected function registerModel()
    {

    }

    /**
     * Register the view generator
     */
    protected function registerView()
    {

    }

    /**
     * Register the controller generator
     */
    protected function registerController()
    {


    }

    /**
     * Register the migration generator
     */
    protected function registerMigration()
    {

    }

    /**
     * Register the seeder generator
     */
    protected function registerSeeder()
    {

    }

    /**
     * Register the pivot generator
     */
    protected function registerPivot()
    {

    }

    /**
     * Register the resource generator
     */
    protected function registerResource()
    {

    }

    /**
     * register command for publish templates
     */
    public function registerpublisher()
    {

    }

    /**
     * register scaffold command
     */
    public function registerScaffold()
    {

    }



	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
