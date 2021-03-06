<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Fields\Traits;


trait Select
{

    public function select($options = [])
    {
        $this->type = 'select';
        $this->options($options);
        return $this;
    }
}
