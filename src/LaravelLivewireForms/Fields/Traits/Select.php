<?php


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
