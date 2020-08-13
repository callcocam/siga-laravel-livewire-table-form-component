<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireTables\Views;


class Confirmationdisplay extends \Livewire\Component
{
    public $confirmations = [];

    public $listeners = [
        'sendConfirmation' => 'receiveConfirmation'
    ];

    public function receiveConfirmation($message, $callback, $callbackData = null)
    {
        $confirmation = [
            'message' => $message,
            'callback' => $callback,
            'callbackData' => $callbackData
        ];

        array_push($this->confirmations, $confirmation);
    }

    public function confirm($key)
    {
        $this->emit($this->confirmations[$key]['callback'], $this->confirmations[$key]['callbackData']);
        $this->removeConfirmation($key);
    }

    public function removeConfirmation($key)
    {
        unset($this->confirmations[$key]);
    }

    public function render()
    {
        return view('livewire.confirmationdisplay');
    }
}
