<?php
Route::livewire('/permissions', 'admin.users.permission-table')->name('admin.permissions.index');
Route::livewire('/permissions/create', 'admin.users.permission-form')->name('admin.permissions.create');
Route::livewire('/permissions/{model}/edit', 'admin.users.permission-form')->name('admin.permissions.edit');
Route::livewire('/permissions/{model}/show', 'admin.users.permissions-form')->name('admin.permissions.show');
