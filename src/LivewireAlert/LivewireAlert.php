<?php


namespace Call\LivewireAlert;


use Call\LivewireAlert\Traits\LivewireAlert as LivewireAlertAlias;

class LivewireAlert
{
 use LivewireAlertAlias;

    public static function make(){
        return new static();
    }
}
