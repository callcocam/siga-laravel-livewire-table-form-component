<?php
Route::livewire('/users', 'admin.users.user-table')->name('admin.users.index');
Route::livewire('/users/create', 'admin.users.user-form')->name('admin.users.create');
Route::livewire('/users/{model}/edit', 'admin.users.user-form')->name('admin.users.edit');
Route::livewire('/users/{model}/show', 'admin.users.users-form')->name('admin.users.show');
