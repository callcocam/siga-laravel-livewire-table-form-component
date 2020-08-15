<?php

if(!function_exists('form_row')){

    function form_row(\Call\LaravelLivewireForms\Fields\Component\FieldComponent $field, $options =[]){
        return $field->render($options);
    }
}
