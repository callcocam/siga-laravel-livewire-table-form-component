<?php


namespace Call\LivewireAlert\Traits;

use Illuminate\Support\Collection;

trait LivewireAlert
{
    /**
     * Default SweetAlert2 Options.
     *
     * @see https://sweetalert2.github.io/#configuration
     * @return collection $options
     */
    public function alertOptions(): Collection
    {
        return collect([
            'position' =>  'top-end',
            'timer' => 3000,
            'toast' => true,
            'title' =>  '',
            'text' => null,
            'showCancelButton' => false,
            'showConfirmButton' => false
        ]);
    }

    /**
     * Alert an specific message.
     *
     *
     * @param  string  $event - success, info, warning, error
     * @param  string  $message - alert message
     * @param  array  $options - SweetAlert2 options
     * @see https://sweetalert2.github.io/#configuration
     * @return void
     */
    public function alert(
        string $event,
        string $message,
        array $options = []
    ) {
        session()->flash('message', $message);
    }

    /**
     * Alert Success event.
     *
     * @param  string  $message
     */
    public function success($message)
    {
        session()->flash('success', $message);
    }

    /**
     * Alert Warning event.
     *
     * @param  string  $message
     */
    public function warning($message)
    {
        session()->flash('warning', $message);
    }

    /**
     * Alert Info event.
     *
     * @param  string  $message
     */
    public function info($message)
    {
        session()->flash('warning', $message);
    }

    /**
     * Alert Error event.
     *
     * @param  string  $message
     */
    public function error($message)
    {
        session()->flash('warning', $message);
    }
}
