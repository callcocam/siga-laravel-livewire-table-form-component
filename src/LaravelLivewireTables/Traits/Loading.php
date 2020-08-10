<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireTables\Traits;


trait Loading
{
    /**
     * Loading.
     */

    /**
     * Whether or not to show a loading indicator when searching.
     *
     * @var bool
     */
    public $loadingIndicator = false;

    /**
     * The loading message that gets displayed.
     *
     * @var string
     */
    public $loadingMessage;
}
