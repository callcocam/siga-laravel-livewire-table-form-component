<?php
Route::livewire('/roles', 'admin.users.role-table')->name('admin.roles.index');
Route::livewire('/roles/create', 'admin.users.role-form')->name('admin.roles.create');
Route::livewire('/roles/{model}/edit', 'admin.users.role-form')->name('admin.roles.edit');
Route::livewire('/roles/{model}/show', 'admin.users.roles-form')->name('admin.roles.show');
