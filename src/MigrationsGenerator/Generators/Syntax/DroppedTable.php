<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace Call\MigrationsGenerator\Generators\Syntax;

class DroppedTable
{
    /**
     * Get string for dropping a table
     *
     * @param      $tableName
     * @param null $connection
     *
     * @return string
     */
    public function drop($tableName, $connection = null)
    {
        //if (!is_null($connection)) $connection = 'connection(\''.$connection.'\')->';
        $sintax[] = sprintf("if(Schema::hasTable('%s')):",$tableName);
        $sintax[] = sprintf("   Schema::drop('%s');", $tableName);
        $sintax[] = "endif;";
        return implode(PHP_EOL, $sintax);
    }
}
