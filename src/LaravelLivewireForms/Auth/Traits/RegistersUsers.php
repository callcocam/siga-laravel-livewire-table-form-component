<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Auth\Traits;

use Call\LaravelLivewireForms\Auth\Traits\Redirects\RedirectsUsers;
use Call\LaravelLivewireForms\Fields\Component\FieldComponent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

trait RegistersUsers
{
    use RedirectsUsers;

    public function model()
    {
        return config('auth.providers.users.model');
    }
    public function formTemplate()
    {
        return form_views("auth.register");
    }

    public function saveAndStayResponse()
    {
        return redirect()->route("admin");
    }
    public function fields()
    {
        return [
            FieldComponent::make('Name')->input()->rules(['required', 'string', 'max:255']),
            FieldComponent::make('Email')->input('email')->rules(['required', 'string', 'email', 'max:255', 'unique:users,email']),
            FieldComponent::make('Password')->input('password')->rules(['required', 'string', 'min:8', 'confirmed']),
            FieldComponent::make('Confirm Password', 'password_confirmation')->input('password'),
        ];
    }

    public function success()
    {
        if(isset($this->form_data['password'])){
            if($this->form_data['password']){
                $this->form_data['password'] = Hash::make($this->form_data['password']);
            }
            else{
                unset($this->form_data['password']);
            }
        }
        event(new Registered($user = $this->query()->create($this->form_data)));

        $this->guard()->login($user);

    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
