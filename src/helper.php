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
