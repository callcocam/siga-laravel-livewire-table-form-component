<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LavewireNotify\Notifiers;

interface NotifierInterface
{
    /**
     * Render the notifications' script tag.
     *
     * @param array $notifications
     *
     * @return string
     */
    public function render(array $notifications): string;

    /**
     * Get Allowed Types
     *
     * @return array
     */
    public function getAllowedTypes(): array;

    /**
     * @return string
     */
    public function getName(): string;
}
