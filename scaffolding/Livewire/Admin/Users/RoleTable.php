<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Admin\Users;

use App\Role;
use Call\LaravelLivewireTables\Views\Delete;
use Call\LaravelLivewireTables\Views\Link;
use Illuminate\Database\Eloquent\Builder;
use Call\LaravelLivewireTables\Views\Column;
use Call\LaravelLivewireTables\TableComponent;

class RoleTable extends TableComponent
{
    public function query(): Builder
    {
        return Role::query();
    }

    public function columns() : array
    {
        return [
            Column::make('ID')
                ->searchable()
                ->sortable(),
            Column::make('Name')
                ->searchable()
                ->sortable(),
            Column::make('Actions')
                ->addComponent(
                   Link::make('Edit')
                       ->icon('fas fa-pencil-alt')
                       ->class('btn btn-primary btn-sm')
                       ->edit($this->route()))
               ->addComponent(
                   Delete::make("Delete", "Confirm")
                       ->icon('fa fa-trash-alt')
               ),
        ];
    }
    public function route(){
        return "roles";
    }
}
