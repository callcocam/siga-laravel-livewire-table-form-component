<?php
Route::livewire('/tenants', 'admin.tenants.tenant-table')->name('admin.tenants.index');
Route::livewire('/tenants/create', 'admin.tenants.tenant-form')->name('admin.tenants.create');
Route::livewire('/tenants/{model}/edit', 'admin.tenants.tenant-form')->name('admin.tenants.edit');
Route::livewire('/tenants/{model}/show', 'admin.tenants.tenants-form')->name('admin.tenants.show');
