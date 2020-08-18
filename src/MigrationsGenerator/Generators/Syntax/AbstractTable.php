<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace Call\MigrationsGenerator\Generators\Syntax;

use Call\MigrationsGenerator\Generators\Compilers\TemplateCompiler;
use Call\MigrationsGenerator\Generators\Filesystem\Filesystem;

abstract class AbstractTable {

    /**
     * @var \Call\MigrationsGenerator\Generators\Filesystem\Filesystem
     */
    protected $file;

    /**
     * @var \Call\MigrationsGenerator\Generators\Compilers\TemplateCompiler
     */
    protected $compiler;

    /**
     * @param Filesystem $file
     * @param TemplateCompiler $compiler
     */
    function __construct(Filesystem $file, TemplateCompiler $compiler)
    {
        $this->compiler = $compiler;
        $this->file = $file;
    }

    /**
     * @param array  $fields
     * @param string $table
     * @param string $method
     * @param null   $connection
     *
     * @return string
     */
    public function run(array $fields, $table, $connection = null, $method = 'table')
    {
        $table = substr($table, strlen(\Illuminate\Support\Facades\DB::getTablePrefix()));
        $this->table = $table;
        //if (!is_null($connection)) $method = 'connection(\''.$connection.'\')->'.$method;
        $compiled = $this->compiler->compile($this->getTemplate(), ['table'=>$table,'method'=>$method]);
        return $this->replaceFieldsWith($this->getItems($fields), $compiled);
    }

    /**
     * Fetch the template of the schema
     *
     * @return string
     */
    protected function getTemplate()
    {
        return $this->file->get(call_migration_generate_path( config('generators.migration_template_schema')));
    }


    /**
     * Replace $FIELDS$ in the given template
     * with the provided schema
     *
     * @param $schema
     * @param $template
     * @return mixed
     */
    protected function replaceFieldsWith($schema, $template)
    {
        return str_replace('$FIELDS$', implode(PHP_EOL."\t\t\t", $schema), $template);
    }
    /**
     * @param $decorators
     * @return string
     */
    protected function addDecorators($decorators)
    {
        $output = '';
        foreach ($decorators as $decorator) {
            $output .= sprintf("->%s", $decorator);
            // Do we need to tack on the parentheses?
            if (strpos($decorator, '(') === false) {
                $output .= '()';
            }
        }
        return $output;
    }

    /**
     * Return string for adding all foreign keys
     *
     * @param array $items
     * @return array
     */
    protected function getItems(array $items)
    {
        $result = array();
        foreach($items as $item) {
            $result[] = $this->getItem($item);
        }
        return $result;
    }

    /**
     * @param array $item
     * @return string
     */
    abstract protected function getItem(array $item);
}
