<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Call\Database\Types\Mysql;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Call\Database\Types\Type;

class MultiPolygonType extends Type
{
    const NAME = 'multipolygon';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        return 'multipolygon';
    }
}
