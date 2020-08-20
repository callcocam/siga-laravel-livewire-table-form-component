<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Admin\Users;

use App\Role;
use Call\LaravelLivewireForms\FormComponent;
use Call\LaravelLivewireForms\Fields\Component\FieldComponent;

class RoleForm extends FormComponent
{
    public function query()
    {
        return Role::query();
    }


    public function mount(Role $model)
    {

        $this->setFormProperties($model);
    }

    public function fields()
    {
        return [
            FieldComponent::make('Name')->input()->rules('required'),
        ];
    }
    public function route(){
        return "roles";
    }

}
