<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Auth\Traits;


use Call\LaravelLivewireForms\Fields\Component\FieldComponent;
use Illuminate\Support\Facades\Password;

trait SendsPasswordResetEmails
{


    public function formTemplate()
    {
        return form_views("auth.passwords.email");
    }

    public function saveAndStayResponse()
    {
        if($this->guard()->check())
            return "admin";

        return 'login';
    }
    public function fields()
    {
        return [
            FieldComponent::make('Email')->input('email')->rules(['required', 'email', 'max:255'])
        ];
    }

    /**
     * Send a reset link to the given user.
     *
     */
    public function sendResetLinkEmail()
    {
        $this->getFormData();

        $this->validateEmail();

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.

        $response = $this->broker()->sendResetLink(
            $this->credentials()
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($response);
    }

    /**
     * Validate the email for the given request.
     *
     * @return void
     */
    protected function validateEmail()
    {
        $this->validate($this->rules());
    }

    /**
     * Get the needed authentication credentials from the request.
     *
     * @return array
     */
    protected function credentials()
    {
        return $this->form_data;
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse($response)
    {
        return back()->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse($response)
    {
        return back()
            ->withInput($this->form_data)
            ->withErrors(['email' => trans($response)]);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }
}
