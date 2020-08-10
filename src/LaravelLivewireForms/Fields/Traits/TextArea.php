<?php


namespace Call\LaravelLivewireForms\Fields\Traits;


trait TextArea
{

    protected $textarea_rows;

    public function textarea($rows = 2)
    {
        $this->type = 'textarea';
        $this->textarea_rows = $rows;
        return $this;
    }
}
