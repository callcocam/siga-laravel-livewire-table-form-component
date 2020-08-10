#SIGA LIVIWIRE TABLE & FORM COMPONENTS

Install The Package<br />
<br />
`
composer require livewire/livewire
`


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
`
// Route
Route::livewire('/auth', 'admin.users.user-table-form');
`
