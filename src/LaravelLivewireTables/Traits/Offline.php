<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireTables\Traits;


trait Offline
{
    /**
     * Offline.
     */

    /**
     * Whether or not to display an offline message when there is no connection.
     *
     * @var bool
     */
    public $offlineIndicator = true;

    /**
     * The message to display when offline.
     *
     * @var string
     */
    public $offlineMessage;
}
