<?php


namespace Call\Menus;


use Illuminate\Support\Facades\Route;

trait CallRoute
{

    /**
     * @param $path
     * @param $view
     * @param $route
     */
    public function index($path, $view, $route){

       $this->setRoutes(sprintf('/%s', $path ), $view, $route);

        return $this;
    }



    /**
     * @param $path
     * @param $view
     * @param $route
     */
    public function create($path, $view, $route){

        $this->setRoutes(sprintf('/%s/create', $path ), $view, $route);

        return $this;
    }

    /**
     * @param $path
     * @param $view
     * @param $route
     */
    public function edit( $path, $view, $route){

        $this->setRoutes(sprintf('/%s/{model}/edit', $path ), $view, $route);

        return $this;
    }

    /**
     * @param $path
     * @param $view
     * @param $route
     */
    public function show( $path, $view, $route){

        $this->setRoutes(sprintf('/%s/{model}/show', $path ), $view, $route);

        return $this;
    }

    private function setRoutes($path, $view, $route){

        Route::group([
            'middleware' => 'web',
            'prefix' => 'admin',
        ], function () use ($path, $view, $route){
            Route::group([
                'middleware' => 'auth'
            ], function () use ($path, $view, $route){
                Route::livewire($path, $view)->name($route);
            });
        });
    }
}
