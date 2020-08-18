<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Call\Database\Types\Common;

use Doctrine\DBAL\Types\FloatType as DoctrineFloatType;

class DoubleType extends DoctrineFloatType
{
    const NAME = 'double';

    public function getName()
    {
        return static::NAME;
    }
}
