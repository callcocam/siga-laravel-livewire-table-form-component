<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Menus;

use Call\Menus\AbstractMenu;

class LogoutMenu extends AbstractMenu
{

        public function __construct(){

             $this->add(
                 \Call\Menus\Menu::meke("Logout")->icon('i-Lock-2')
                     ->add(\Call\Menus\Item::make("Logout")->icon('i-Unlock-2')->route('logout')
                         ->index('logout', 'admin.auth.logout-form','logout'))->sort(1000)
                 );
        }
}
