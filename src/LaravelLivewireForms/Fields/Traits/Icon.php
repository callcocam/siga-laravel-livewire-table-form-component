<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Fields\Traits;


trait Icon
{
    protected $icon;
    protected $tag = 'i';

    /**
     * Icon constructor.
     * @param $icon
     */
    public function icon($icon)
    {
        $this->icon = $icon;
        return $this;

    }

    public function tag($tag)
    {
        $this->tag = $tag;
        return $this;
    }
}
