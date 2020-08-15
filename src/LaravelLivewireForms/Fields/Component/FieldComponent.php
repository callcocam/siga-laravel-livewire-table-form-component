<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Fields\Component;


use Call\LaravelLivewireForms\Fields\AbstractField;
use Illuminate\Support\Str;

class FieldComponent extends AbstractField
{
    protected $rendered = false;
    protected $key;
    protected $file_multiple;
    protected $array_fields = [];
    protected $array_sortable = false;

    public function __construct($label, $name)
    {
        $this->label = $label;
        $this->placeholder = $label;
        $this->name = $name ?? Str::snake(Str::lower($label));
        $this->key = 'form_data.' . $this->name;
    }

    public static function make($label, $name = null)
    {
        return new static($label, $name);
    }

    public function file()
    {
        $this->type = 'file';
        return $this;
    }

    public function multiple()
    {
        $this->file_multiple = true;
        return $this;
    }

    public function array($fields = [])
    {
        $this->type = 'array';
        $this->array_fields = $fields;
        return $this;
    }

    public function sortable()
    {
        $this->array_sortable = true;
        return $this;
    }

    public function render($options=[]){

        $this->rendered = true;
        if($this->view)
          return view($this->view)->with('field', $this)->render();

          return view(sprintf('lw-forms::fields.%s', $this->type))->with('field', $this)->render();

    }
}
