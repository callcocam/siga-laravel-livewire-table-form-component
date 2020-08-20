<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Fields\Traits;


trait Label
{

    protected $isShowLabel = true;

    protected $class_label = "";

    public $label = "";

    /**
     * @return bool
     */
    public function isShowLabel(): bool
    {

        return $this->isShowLabel;
    }

    /**
     * @param bool $isShowLabel
     */
    public function setIsShowLabel(bool $isShowLabel =false)
    {
        $this->isShowLabel = $isShowLabel;

        return $this;
    }

    /**
     * @return string
     */
    public function getClassLabel(): string
    {
        return $this->class_label;
    }

    /**
     * @param string $class_label
     */
    public function setClassLabel(string $class_label): void
    {
        $this->class_label = $class_label;
    }
}
