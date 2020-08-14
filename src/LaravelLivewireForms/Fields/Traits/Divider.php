<?php


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
}
