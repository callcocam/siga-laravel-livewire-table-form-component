<?php

return [

    'path' => '/database/seeds/rollback',
    'chunk_size' => 500, // Maximum number of rows per insert statement,
    /*
    |--------------------------------------------------------------------------
    | Where the templates for the generators are stored...
    |--------------------------------------------------------------------------
    |
    */
    'model_template_path' => 'storage/templates/model.txt',

    'migration_template_path' => 'storage/templates/migration.txt',

    'migration_template_schema' => 'storage/templates/schema.txt',


    /*
    |--------------------------------------------------------------------------
    | Where the generated files will be saved...
    |--------------------------------------------------------------------------
    |
    */
    'model_target_path'   => app_path(),

    'migration_target_path'   => base_path('database/migrations')

];
