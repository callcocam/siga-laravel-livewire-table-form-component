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

class ChildComponent extends AbstractField
{
    protected $column_width;

    public function __construct($label, $name)
    {
        $this->label = $label;
        $this->placeholder = $label;
        $this->name = $name ?? Str::snake(Str::lower($label));
        $this->key = 'form_data.' . $this->name;
    }

    public static function make($label=null, $name = null)
    {
        if(is_null($label))
            $label = Uuid::uuid4();
        return new static($label, $name);
    }

}
