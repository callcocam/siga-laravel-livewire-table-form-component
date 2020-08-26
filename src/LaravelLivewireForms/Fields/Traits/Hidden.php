<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Fields\Traits;


trait Hidden
{
    public function hidden()
    {
        $this->type = 'hidden';
        $this->input_type = 'hidden';
        $this->setIsShowLabel(false);
        return $this;
    }


}
