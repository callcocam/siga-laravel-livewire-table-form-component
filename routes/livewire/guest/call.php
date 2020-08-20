<?php

Route::livewire('login', 'admin.auth.login-form')->name('login')->layout('layouts.auth');
Route::livewire('register', 'admin.auth.register-form')->name('register')->layout('layouts.auth');
Route::livewire('password/request', 'admin.auth.request-form')->name('password.request')->layout('layouts.auth');
Route::livewire('password/reset', 'admin.auth.reset-form')->name('password.reset')->layout('layouts.auth');
