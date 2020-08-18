<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * https://www.sigasmart.com.br
 */
namespace Call\MigrationsGenerator\Generators\Compilers;

interface Compiler {

    /**
     * Compile the template using
     * the given data
     *
     * @param $template
     * @param $data
     */
    public function compile($template, $data);
}
