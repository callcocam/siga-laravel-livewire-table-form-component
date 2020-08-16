<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Auth\Traits;

use Call\LaravelLivewireForms\Auth\Traits\Redirects\RedirectsUsers;
use Call\LaravelLivewireForms\Fields\Component\FieldComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

trait AuthenticatesUsers
{
    use RedirectsUsers, ThrottlesLogins;


    public function formTemplate()
    {
        return form_views("auth.login");
    }

    public function saveAndStayResponse()
    {

        if($this->guard()->check()){
            $this->alert("Login realizado com sucesso");
            return "admin";
        }


        return 'login';
    }
    public function fields()
    {
        return [
            FieldComponent::make('Email')->input('email')->rules(['required', 'email', 'max:255'])->setIsShowLabel(),
            FieldComponent::make('Password')->input('password')->rules(['required', 'min:8'])->setIsShowLabel(),
        ];
    }

    /**
     * Handle a login request to the application.
     */
    public function login()
    {
        $this->getFormData();

        $this->validateLogin();

        if ($this->attemptLogin()) {

            return $this->sendLoginResponse();
        }

        return $this->sendFailedLoginResponse();
    }

    /**
     * Validate the user login request.
     */
    protected function validateLogin()
    {
        $this->validate($this->rules());
    }

    /**
     * Attempt to log the user into the application.
     *
     * @return bool
     */
    protected function attemptLogin()
    {

        return $this->guard()->attempt(
            $this->credentials(), $this->filled('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
    * @return array
     */
    protected function credentials()
    {
        return $this->form_data;
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse()
    {
        request()->session()->regenerate();

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Get the failed login response instance.
     */
    protected function sendFailedLoginResponse()
    {
        $this->error(trans('auth.failed'));
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }
    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        $this->guard()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route($this->saveAndStayResponse());
    }


    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
