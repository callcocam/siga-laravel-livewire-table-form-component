<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Menus;

use Call\Menus\AbstractMenu;

class AdminMenu extends AbstractMenu
{

        public function __construct(){

             $this->add(
                 \Call\Menus\Menu::meke("Dashboard")->icon('i-Lock-2')
                     ->add(\Call\Menus\Item::make("Dashboard")->icon('i-Dashboard')->route('admin')
                         ->index('', 'admin.dashboard','admin'))->sort(0)
                 );
        }
}
