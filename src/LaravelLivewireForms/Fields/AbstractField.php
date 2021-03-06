<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Fields;


use Call\LaravelLivewireForms\Fields\Traits\CheckBox;
use Call\LaravelLivewireForms\Fields\Traits\DataList;
use Call\LaravelLivewireForms\Fields\Traits\Divider;
use Call\LaravelLivewireForms\Fields\Traits\Hidden;
use Call\LaravelLivewireForms\Fields\Traits\Icon;
use Call\LaravelLivewireForms\Fields\Traits\Label;
use Call\LaravelLivewireForms\Fields\Traits\Radio;
use Call\LaravelLivewireForms\Fields\Traits\Row;
use Call\LaravelLivewireForms\Fields\Traits\Select;
use Call\LaravelLivewireForms\Fields\Traits\TextArea;
use Call\LaravelLivewireForms\Fields\Traits\WithAttributes;
use Illuminate\Support\Arr;

abstract class AbstractField
{
    use CheckBox, Icon, Label, Radio, Select, TextArea, Divider, Row, Hidden, DataList, WithAttributes;
    protected $name;
    protected $type;
    protected $class;
    protected $input_type;
    protected $options;
    protected $default;
    protected $autocomplete;
    protected $placeholder;
    protected $help;
    protected $rules;
    protected $view;
    protected $coll = 3;

    public function __get($property)
    {
        return $this->$property;
    }

    public function input($type = 'text')
    {
        $this->type = 'input';
        $this->input_type = $type;
        return $this;
    }

    protected function options($options)
    {
        $this->options = Arr::isAssoc($options) ? array_flip($options) : array_combine($options, $options);
    }

    public function class($class)
    {
        $this->class = $class;
        return $this;
    }

    public function default($default)
    {
        $this->default = $default;
        return $this;
    }

    public function autocomplete($autocomplete)
    {
        $this->autocomplete = $autocomplete;
        return $this;
    }

    public function placeholder($placeholder)
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public function help($help)
    {
        $this->help = $help;
        return $this;
    }

    public function rules($rules)
    {
        $this->rules = $rules;
        return $this;
    }

    public function view($view)
    {
        $this->view = $view;
        return $this;
    }

    public function coll($coll)
    {
        $this->coll = $coll;
        return $this;
    }

}
