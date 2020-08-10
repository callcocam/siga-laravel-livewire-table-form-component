<?php


namespace Call\LaravelLivewireForms\Fields\Traits;


trait CheckBox
{

    public function checkbox()
    {
        $this->type = 'checkbox';
        return $this;
    }

    public function checkboxes($options = [])
    {
        $this->type = 'checkboxes';
        $this->options($options);
        return $this;
    }
}
