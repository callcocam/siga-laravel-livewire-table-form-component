<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireTables\Views;


use Call\LaravelLivewireTables\Traits\CanBeHidden;
use Call\LaravelLivewireTables\Views\Contracts\ComponentContract;

abstract class Component implements ComponentContract
{
    use CanBeHidden;
    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @param $attribute
     * @param $value
     *
     * @return $this
     */
    public function setAttribute($attribute, $value): self
    {
        $this->attributes[$attribute] = $value;

        return $this;
    }

    /**
     * @param  array  $attributes
     *
     * @return $this
     */
    public function setAttributes(array $attributes = []): self
    {
        $this->attributes = array_merge($this->attributes, $attributes);

        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param $option
     * @param $value
     *
     * @return $this
     */
    public function setOption($option, $value): self
    {
        $this->options[$option] = $value;

        return $this;
    }

    /**
     * @param  array  $options
     *
     * @return $this
     */
    public function setOptions(array $options = []): self
    {
        $this->options = array_merge($this->options, $options);

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}
