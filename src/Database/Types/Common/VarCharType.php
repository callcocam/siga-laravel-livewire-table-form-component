<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Call\Database\Types\Common;

use Doctrine\DBAL\Types\StringType as DoctrineStringType;

class VarCharType extends DoctrineStringType
{
    const NAME = 'varchar';

    public function getName()
    {
        return static::NAME;
    }
}
