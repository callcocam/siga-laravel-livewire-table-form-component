<?php

if(!function_exists('form_row')){

    function form_row(\Call\LaravelLivewireForms\Fields\Component\FieldComponent $field, $options =[]){
        return $field->render($options);
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
