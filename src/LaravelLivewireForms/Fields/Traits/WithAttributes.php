<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Fields\Traits;


trait WithAttributes
{

    protected $attributes =[];

    public function attributes($attributes)
    {
        foreach ($attributes as $key=>$value):
            $this->attribute($key, $value);
        endforeach;
    }


    public function attribute($key, $value)
    {
        $this->attributes[$key] = $value;
        return $this;
    }
}
