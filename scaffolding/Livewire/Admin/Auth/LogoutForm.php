<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Admin\Auth;

use Call\LaravelLivewireForms\Auth\Traits\AuthenticatesUsers;
use Call\LaravelLivewireForms\FormComponent;

class LogoutForm extends FormComponent
{
    use AuthenticatesUsers;

    public function mount($model = null)
    {
       $this->logout();
    }

    public function route(){
        return "users";
    }
}
