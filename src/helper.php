<?php

if(!function_exists('form_row')){

    function form_row($fields, $name){

        foreach ($fields as $field):

            if($field->name == $name){
                return $field->render();
                break;
            }
            endforeach;
    }
}
