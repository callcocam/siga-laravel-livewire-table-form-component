<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Fields\Traits;


trait Radio
{
    public function radio($options = [])
    {
        $this->type = 'radio';
        $this->options($options);
        return $this;
    }

}
