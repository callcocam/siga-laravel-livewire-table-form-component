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
            \Call\Menus\Menu::meke("Tenants")->icon('i-Gears')

                ->add(
                    \Call\Menus\Item::make("List Tenants")
                        ->route('admin.tenants.index')
                        ->index('tenants', 'admin.tenants.tenant-table','admin.tenants.index')
                        ->create('tenants','admin.tenants.tenant-form','admin.tenants.create')
                        ->edit('tenants','admin.tenants.tenant-form','admin.tenants.edit')
                        ->show('tenants','admin.tenants.tenant-show','admin.tenants.show')
                )
                ->add(\Call\Menus\Item::make("Configuration")->icon('i-Gear')->route('config')
                    ->index('configuracoes', 'admin.tenants.config-form','config'))

                ->add(\Call\Menus\Item::make("List Companys")->icon('i-Gears')->route('admin.companies.index')
                    ->index('companies', 'admin.tenants.company-table','admin.companies.index')
                    ->create('companies','admin.tenants.company-form','admin.companies.create')
                    ->edit('companies','admin.tenants.company-form','admin.companies.edit')
                    ->show('companies','admin.tenants.company-show','admin.companies.show'))
        );
    }
}
