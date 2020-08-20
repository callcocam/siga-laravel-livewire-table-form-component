<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Admin\Auth;

use App\User;
use Call\LaravelLivewireForms\Auth\Traits\SendsPasswordResetEmails;
use Call\LaravelLivewireForms\FormComponent;

class RequestForm extends FormComponent
{

    use SendsPasswordResetEmails;

    public function route(){
        return "users";
    }
}
