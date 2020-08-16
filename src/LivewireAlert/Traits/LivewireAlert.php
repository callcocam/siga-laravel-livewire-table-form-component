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
     * Alert Success event.
     *
     * @param  string  $message
     */
    public function alert($message)
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
