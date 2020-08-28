<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Fields\Component;


use Call\LaravelLivewireForms\Fields\AbstractField;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class FieldComponent extends AbstractField
{
    protected $rendered = false;
    protected $key;
    protected $file_multiple;
    protected $array_fields = [];
    protected $child_fields = [];
    protected $array_sortable = false;

    public function __construct($label, $name)
    {
        $this->label = $label;
        $this->name = $name ?? Str::snake(Str::lower($label));
        $this->key = 'form_data.' . $this->name;
    }

    public static function make($label=null, $name = null)
    {
        if(is_null($label))
            $label = Uuid::uuid4();
        return new static($label, $name);
    }

    public function cover()
    {
       // $this->default = '/users/no_image.jpg';
        $this->type = 'cover';
        return $this;
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


    public function child($fields = [])
    {
        $this->type = 'child';
        $this->child_fields = $fields;
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

        return view(form_views_fields( $this->type))->with('field', $this)->render();

    }
}
