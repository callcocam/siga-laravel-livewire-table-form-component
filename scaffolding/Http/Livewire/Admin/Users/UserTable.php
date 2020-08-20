<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Admin\Users;

use App\User;
use Call\LaravelLivewireTables\Views\Button;
use Call\LaravelLivewireTables\Views\Cover;
use Call\LaravelLivewireTables\Views\Delete;
use Call\LaravelLivewireTables\Views\Link;
use Illuminate\Database\Eloquent\Builder;
use Call\LaravelLivewireTables\Views\Column;
use Call\LaravelLivewireTables\TableComponent;

class UserTable extends TableComponent
{

    public $refresh = true;

    public function query(): Builder
    {
        return User::query();
    }

    public function columns() : array
    {
        return [
            Column::make('Cover')->
                addComponent(Cover::make()->class("avatar avatar-sm rounded-circle")),
            Column::make('Name')
                ->searchable()
                ->sortable(),
            Column::make('Email')
                ->searchable()
                ->sortable(),
            Column::make('Actions')
                ->addComponent(
                    Link::make('Edit')
                        ->icon('fa fa-pencil-alt')
                        ->class('btn btn-primary btn-sm')
                        ->edit($this->route()))
                ->addComponent(
                    Delete::make("Delete", "Confirm")
                        ->icon('fa fa-trash-alt')
                )
        ];
    }

    public function route(){
        return "users";
    }

}
