<?php
Route::group([
    'prefix'=>'admin'
], function(){
    Route::group([
        'middleware'=>'auth'
    ], function(){

        Route::livewire('', 'admin.dashboard')->name('admin');
        Route::livewire('/logout', 'admin.auth.logout-form')->name('logout');
    });
    \Illuminate\Support\Facades\Route::group([
        'middleware'=>'guest'
    ], function(){
        Route::livewire('login', 'admin.auth.login-form')->name('login')->layout('layouts.auth');
        Route::livewire('register', 'admin.auth.register-form')->name('register')->layout('layouts.auth');
        Route::livewire('password/request', 'admin.auth.request-form')->name('password.request')->layout('layouts.auth');
        Route::livewire('password/reset', 'admin.auth.reset-form')->name('password.reset')->layout('layouts.auth');
    });
});
