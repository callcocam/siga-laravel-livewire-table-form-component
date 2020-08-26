<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Admin\Users;

use App\Permission;
use Call\LaravelLivewireTables\Views\Delete;
use Call\LaravelLivewireTables\Views\Link;
use Illuminate\Database\Eloquent\Builder;
use Call\LaravelLivewireTables\Views\Column;
use Call\LaravelLivewireTables\TableComponent;

class PermissionTable extends TableComponent
{
    public function query(): Builder
    {
        return Permission::query();
    }

    public function columns() : array
    {
        return [
             Column::make('Name')
                ->searchable()
                ->sortable(),
            Column::make('Grupo')
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
        return "permissions";
    }
}
