<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Menus;

use Call\Menus\AbstractMenu;

class ProfileMenu extends AbstractMenu
{

        public function __construct(){

             $this->add(
                 \Call\Menus\Menu::meke("Profile")->icon('i-Lock-2')
                     ->add(\Call\Menus\Item::make("Profile")->icon('i-Dashboard')->route('profile')
                         ->setAuthorization(true)
                         ->index('profile', 'admin.users.profile-form','profile'))->sort(999)
                 );
        }
}
