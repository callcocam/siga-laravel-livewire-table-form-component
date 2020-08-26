<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Menus;

use Call\Menus\AbstractMenu;

class IconeMenu extends AbstractMenu
{

    public function __construct(){

        $this->add(
            \Call\Menus\Menu::meke("Icons")->icon('i-Gears')
                ->add(\Call\Menus\Item::make("List Icons")->icon('i-Cursor-Click')->route('admin.icons.index')
                    ->index('icones', 'admin.utils.icons','admin.icons.index'))->sort(1)
        );
    }
}
