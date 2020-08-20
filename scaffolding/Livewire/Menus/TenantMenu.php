<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Menus;

use Call\Menus\AbstractMenu;

class TenantMenu extends AbstractMenu
{

        public function __construct(){

             $this->add(
                 \Call\Menus\Menu::meke("Tenants")
                     ->add(\Call\Menus\Item::make("List Tenants")->route('admin.tenants.index'))
                 );
        }
}
