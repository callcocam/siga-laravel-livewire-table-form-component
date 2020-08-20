<?php

Route::livewire('', 'admin.dashboard')->name('admin');
Route::livewire('/logout', 'admin.auth.logout-form')->name('logout');
