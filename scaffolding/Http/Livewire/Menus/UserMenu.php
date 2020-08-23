<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Menus;

use Call\Menus\AbstractMenu;

class UserMenu extends AbstractMenu
{

        public function __construct(){

             $this->add(
                 \Call\Menus\Menu::meke("Security")->icon('i-Lock-2')
                     ->add(\Call\Menus\Item::make("List Users")->route('admin.users.index')
                         ->index('users', 'admin.users.user-table','admin.users.index')
                         ->create('users','admin.users.user-form','admin.users.create')
                         ->edit('users','admin.users.user-form','admin.users.edit')
                         ->show('users','admin.users.user-show','admin.users.show')
                     )
                     ->add(\Call\Menus\Item::make("List Roles")->route('admin.roles.index')
                         ->index('roles', 'admin.users.role-table','admin.roles.index')
                         ->create('roles','admin.users.role-form','admin.roles.create')
                         ->edit('roles','admin.users.role-form','admin.roles.edit')
                         ->show('roles','admin.users.role-show','admin.roles.show')
                     )
                     ->add(\Call\Menus\Item::make("List Permissions")->route('admin.permissions.index')
                         ->index('permissions', 'admin.users.permission-table','admin.permissions.index')
                         ->create('permissions','admin.users.permission-form','admin.permissions.create')
                         ->edit('permissions','admin.users.permission-form','admin.permissions.edit')
                         ->show('permissions','admin.users.permission-show','admin.permissions.show')
                     )->sort(2)
                 );
        }
}
