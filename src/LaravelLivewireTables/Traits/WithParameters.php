<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireTables\Traits;


trait WithParameters
{


    public function refresh(){

        return route(sprintf("admin.%s.index", $this->route()));
    }

    public function endpoint(){

        return route(sprintf("admin.%s.create", $this->route()), $this->getUpdatesQueryParametersClean());
    }

    public function getUpdatesQueryParameters($model)
    {
        return array_merge(["model" => $model->getKey()], $this->resolveQuery());
    }


    public function getUpdatesQueryParametersClean()
    {
        return $this->resolveQuery();
    }

    public function resolveQuery()
    {
        // The "page" query string item should only be available
        // from within the original component mount run.
        return request()->query();
    }
}
