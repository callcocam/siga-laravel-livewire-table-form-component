#SIGA LIVIWIRE TABLE & FORM COMPONENTS

#Install The Package livewire
<br />
<br />
`
composer require livewire/livewire
`

#Install The Package siga-laravel-livewire-table-form-component
<br />
<br />
`
composer require callcocam/siga-laravel-livewire-table-form-component
`
<br />
<br />
#Making Form Components

Using the make command:<br />
`
php artisan make:form Admin/Auth/RegisterForm --model=User
`

Using route form component:<br />
`
// Route
Route::livewire('/auth', 'admin.auth.register-form');
`

#Making Table Components

Using the make command:<br />

`
php artisan make:table Admin/Users/UserTable --model=User
`

Using route table component:<br />
// Route
<br />
`
Route::livewire('/auth', 'admin.users.user-table-form');
`
