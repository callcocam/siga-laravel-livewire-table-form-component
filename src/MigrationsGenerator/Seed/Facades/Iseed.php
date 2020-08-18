<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace Call\MigrationsGenerator\Seed\Facades;

use Illuminate\Support\Facades\Facade;

class Iseed extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'iseed';
    }
}
