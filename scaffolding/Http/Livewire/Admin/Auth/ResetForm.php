<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Admin\Auth;

use Call\LaravelLivewireForms\Auth\Traits\ResetsPasswords;
use Call\LaravelLivewireForms\FormComponent;

class ResetForm extends FormComponent
{
    use ResetsPasswords;

    public function route(){
        return "users";
    }
}
