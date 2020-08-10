<?php


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
