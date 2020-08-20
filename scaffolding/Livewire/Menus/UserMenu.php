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
                 \Call\Menus\Menu::meke("Users")
                     ->add(\Call\Menus\Item::make("List Users")->route('admin.users.index'))
                     ->add(\Call\Menus\Item::make("List Roles")->route('admin.roles.index'))
                     ->add(\Call\Menus\Item::make("List Permissions")->route('admin.permissions.index'))
                 );
        }
}
