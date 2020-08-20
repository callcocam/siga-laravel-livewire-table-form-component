<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Fields\Traits;


trait DataList
{
    public function datalist($options = [])
    {
        $this->options($options);

        return $this;
    }
    public function isDatalist()
    {
        return $this->options;
    }
}
