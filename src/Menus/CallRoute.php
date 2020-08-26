<?php


namespace Call\Menus;


use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Route;

trait CallRoute
{
    protected $authorization = false;
    /**
     * @param $path
     * @param $view
     * @param $route
     */
    public function index($path, $view, $route, $middleware="auth", $layout="app"){

       $this->setRoutes(sprintf('/%s', $path ), $view, $route, $middleware, $layout);

        return $this;
    }



    /**
     * @param $path
     * @param $view
     * @param $route
     */
    public function create($path, $view, $route, $middleware="auth", $layout="app"){

        $this->setRoutes(sprintf('/%s/create', $path ), $view, $route, $middleware, $layout);

        return $this;
    }

    /**
     * @param $path
     * @param $view
     * @param $route
     */
    public function edit( $path, $view, $route, $middleware="auth", $layout="app"){

        $this->setRoutes(sprintf('/%s/{model}/edit', $path ), $view, $route, $middleware, $layout);

        return $this;
    }

    /**
     * @param $path
     * @param $view
     * @param $route
     */
    public function show( $path, $view, $route, $middleware="auth", $layout="app"){

        $this->setRoutes(sprintf('/%s/{model}/show', $path ), $view, $route, $middleware, $layout);

        return $this;
    }

    /**
     * @param bool $authorization
     */
    public function setAuthorization(bool $authorization)
    {
        $this->authorization = $authorization;

        return $this;
    }

    private function setRoutes($path, $view, $route, $middleware="auth", $layout="app"){

       if( \Illuminate\Support\Facades\Gate::denies($route) || $this->authorization)
       {
            Route::group([
               'middleware' => 'web',
               'prefix' => 'admin',
           ], function () use ($path, $view, $route,$middleware,$layout){
               Route::group([
                   'middleware' => $middleware
               ], function () use ($path, $view, $route,$layout){
                   Route::livewire($path, $view)->name($route)->layout(sprintf('layouts.%s', $layout));
               });
           });
       }
    }
}
