<?php

if (!function_exists('get_tenant_id')) {
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function get_tenant_id($tenant = 'tenant_id')
    {
        $tenantId = \Call\Suports\Tenant\Facades\Tenant::getTenantId($tenant);
        return $tenantId;
    }
}

if (!function_exists('get_tenant')) {
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return Tenant
     */
    function get_tenant()
    {
        return \Illuminate\Support\Facades\DB::table('tenants')->where('id', get_tenant_id())->first();
    }
}

if(!function_exists('call_migration_generate_path')){

    function call_migration_generate_path($path =""){
        return str_replace(['\\', '/'],[DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], sprintf("%s%sMigrationsGenerator%s%s", realpath(__DIR__),DIRECTORY_SEPARATOR,DIRECTORY_SEPARATOR, $path));
    }
}
if(!function_exists('form_row')){

    function form_row(\Call\LaravelLivewireForms\Fields\Component\FieldComponent $field, $options =[]){
        return $field->render($options);
    }
}

if(!function_exists('call_views')){

    function call_views($view){
        return sprintf("lw-call-views::livewire.%s", $view);
    }
}


if(!function_exists('table_views')){

    function table_views($view){
        return sprintf("lw-tables-views::%s", $view);
    }
}

if(!function_exists('table_views_includes')){

    function table_views_includes($view){
        return table_views(sprintf("includes.%s", $view));
    }
}

if(!function_exists('form_views')){

    function form_views($view){
        return sprintf("lw-forms-views::%s", $view);
    }
}

if(!function_exists('form_views_fields')) {

    function form_views_fields($view)
    {
        return form_views(sprintf("fields.%s", $view));
    }

}

if(!function_exists('form_views_arrays')){

    function form_views_arrays($view){
        return form_views(sprintf("array-fields.%s", $view));
    }
}

if(!function_exists('form_views_child')){

    function form_views_child($view){
        return form_views(sprintf("child-fields.%s", $view));
    }
}


if(!function_exists('alert_views')){

    function alert_views($view="messages"){
        return sprintf("lw-alert-views::%s", $view);
    }
}


use Call\LavewireNotify\Notify;

if (! function_exists('notify')) {
    /**
     * @param string $message
     * @param string $type
     * @param string $title
     * @param array  $options
     *
     * @return Notify
     */
    function notify(string $message = null, string $type = 'success', string $title = '', array $options = []): Notify
    {
        if (is_null($message)) {
            return app('notify');
        }

        return app('notify')->addNotification($type, $message, $title, $options);
    }
}

if (! function_exists('notify_js')) {
    /**
     * @return string
     */
    function notify_js(): string
    {
        $driver  = config('notify.default');
        $scripts = config('notify.'.$driver.'.notify_js');

        return '<script type="text/javascript" src="'.implode('"></script><script type="text/javascript" src="', $scripts).'"></script>';
    }
}

if (! function_exists('notify_css')) {
    /**
     * @return string
     */
    function notify_css(): string
    {
        $driver  = config('notify.default');
        $styles = config('notify.'.$driver.'.notify_css');

        return '<link rel="stylesheet" type="text/css" href="'.implode('"><link rel="stylesheet" type="text/css" href="', $styles).'">';
    }
}


if (!function_exists('get_reflection_method')) {
    function get_reflection_method($object, $method)
    {
        $reflectionMethod = new \ReflectionMethod($object, $method);
        $reflectionMethod->setAccessible(true);

        return $reflectionMethod;
    }
}


if (!function_exists('form_w')) {
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function form_w($post)
    {
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $post); //remove os pontos e substitui a virgula pelo ponto
        return $valor; //retorna o valor formatado para gravar no banco
    }
}


if (!function_exists('form_read')) {
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function form_read($post)
    {
        if (is_numeric($post)) :
            return @number_format($post, 2, ",", ".");
        endif;
        return $post;
    }
}

if (!function_exists('Calcular')) {
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function Calcular($v1, $v2, $op)
    {
        if (!$v1)
            $v1 = 0;
        if (!$v2)
            $v2 = 0;
        $v1 = str_replace(".", "", $v1);
        $v1 = str_replace(",", ".", $v1);
        $v2 = str_replace(".", "", $v2);
        $v2 = str_replace(",", ".", $v2);
        switch ($op) {
            case "+":
                $r = $v1 + $v2;
                break;
            case "-":
                $r = $v1 - $v2;
                break;
            case "*":
                $r = $v1 * $v2;
                break;
            case "%":
                $bs = $v1 / 100;
                $j = $v2 * $bs;
                $r = $v1 + $j;
                break;
            case "/":
                @$r = @$v1 / $v2;
                break;
            case "tj":
                $bs = $v1 / 100;
                $j = $v2 * $bs;
                $r = $j;
                break;
            default:
                $r = $v1;
                break;
        }
        $ret = @number_format($r, 2, ",", ".");
        return $ret;
    }
}
