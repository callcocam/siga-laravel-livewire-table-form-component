<?php


namespace Call\Scopes;

use Ramsey\Uuid\Uuid;

trait UuidGenerate
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function($model){
            $model->id = Uuid::uuid4();
        });
    }
}
