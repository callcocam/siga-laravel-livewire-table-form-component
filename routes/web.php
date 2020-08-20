<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'admin'
], function () {
    Route::group([
        'middleware' => 'auth'
    ], function () {
        collect(glob(base_path('routes/livewire/auth/*.php')))
            ->each(function($path) {
                include_once $path;
            });
    });
    \Illuminate\Support\Facades\Route::group([
        'middleware' => 'guest'
    ], function () {
        collect(glob(base_path('routes/livewire/guest/*.php')))
            ->each(function($path) {
                include_once $path;
            });
    });
});
