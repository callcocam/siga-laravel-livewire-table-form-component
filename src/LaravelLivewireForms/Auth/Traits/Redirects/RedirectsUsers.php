<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Auth\Traits\Redirects;


trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {

        if (method_exists($this, 'saveAndStayResponse')) {
            return $this->saveAndStayResponse();
        }

        return  'home';
    }
}
