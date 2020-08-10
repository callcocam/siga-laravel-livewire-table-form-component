<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Fields\Component;


use Call\LaravelLivewireForms\Fields\AbstractField;

class ArrayComponent extends AbstractField
{
    protected $column_width;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public static function make($name)
    {
        return new static($name);
    }

    public function columnWidth($width)
    {
        $this->column_width = $width;
        return $this;
    }
}
