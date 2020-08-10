<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireTables\Traits;


trait CanBeHidden
{
    /**
     * @var bool
     */
    protected $hidden = false;

    /**
     * @param $condition
     *
     * @return $this
     */
    public function hideIf($condition): self
    {
        $this->hidden = $condition === true;

        return $this;
    }

    /**
     * @param  bool  $hidden
     *
     * @return $this
     */
    public function hide($hidden = true): self
    {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->hidden;
    }
}
