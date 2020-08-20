<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Fields\Traits;


trait Divider
{

    protected $class_divider = "";

    public function divider($text="")
    {
        $this->type = 'divider';
        $this->label = $text;
        return $this;
    }

    public function isDivider(){

        return $this->type === 'divider';
    }
}
