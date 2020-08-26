<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Menus;

use Call\Menus\AbstractMenu;

class AuthMenu extends AbstractMenu
{

        public function __construct(){

            $this->add(
                \Call\Menus\Menu::meke("Profile")->icon('i-Lock-2')
                    ->add(\Call\Menus\Item::make("Login")->icon('i-Unlock-2')->route('login')
                        ->index('login', 'admin.auth.login-form','login','guest', 'auth'))->sort(88)

                    ->add(\Call\Menus\Item::make("Register")->icon('i-Unlock-2')->route('register')
                        ->index('register', 'admin.auth.register-form','register','guest', 'auth'))->sort(88)

                    ->add(\Call\Menus\Item::make("Request")->icon('i-Unlock-2')->route('password.request')
                        ->index('password/request', 'admin.auth.request-form','password.request','guest', 'auth'))->sort(88)

                    ->add(\Call\Menus\Item::make("Reset")->icon('i-Unlock-2')->route('password.reset')
                        ->index('password/reset', 'admin.auth.reset-form','password.reset','guest', 'auth'))->sort(88)

            )->show(false);
        }
}
