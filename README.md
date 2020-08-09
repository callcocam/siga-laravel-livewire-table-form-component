#SIGA LIVIWIRE TABLE & FORM COMPONENTS

#Making Form Components

Using the make command:
`
php artisan make:form Admin/Auth/RegisterForm --model=User
`

Using route form component:
`
// Route
Route::livewire('/auth', 'admin.auth.register-form');
`

#Making Table Components

Using the make command:
`
php artisan make:table Admin/Users/UserTable --model=User
`

Using route table component:
`
// Route
Route::livewire('/auth', 'admin.users.user-table-form');
`
