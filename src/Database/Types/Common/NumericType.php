<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Call\Database\Types\Common;


use Doctrine\DBAL\Types\DecimalType as DoctrineDecimalType;

class NumericType extends DoctrineDecimalType
{
    const NAME = 'numeric';

    public function getName()
    {
        return static::NAME;
    }
}
