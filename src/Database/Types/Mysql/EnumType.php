<?php

/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Call\Database\Types\Mysql;

use DB;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Call\Database\Types\Type;


class EnumType extends Type
{
    const NAME = 'enum';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        $enumField = collect(DB::select(DB::raw('SHOW COLUMNS FROM ' . DB::getQueryGrammar()->wrap($this->tableName))))->where('Field', $field['name'])->first();

        if (!is_null($enumField)) {
            return $enumField->Type;
        } else {
            throw new \Exception('Enum definition error');
            // throw new \Exception('Enum type is not supported');
            // get allowed from $column instance???
            // learn more about this....

            $pdo = DB::connection()->getPdo();

            // trim the values
            $allowed = array_map(function ($value) use ($pdo) {
                return $pdo->quote(trim($value));
            }, $allowed);

            return 'enum(' . implode(', ', $allowed) . ')';
        }
    }
}
