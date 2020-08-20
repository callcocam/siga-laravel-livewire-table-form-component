<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Admin\Users;

use App\Permission;
use Call\LaravelLivewireForms\FormComponent;
use Call\LaravelLivewireForms\Fields\Component\FieldComponent;

class PermissionForm extends FormComponent
{
    public function query()
    {
        return Permission::query();
    }


    public function mount(Permission $model)
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
        return "permissions";
    }

}
