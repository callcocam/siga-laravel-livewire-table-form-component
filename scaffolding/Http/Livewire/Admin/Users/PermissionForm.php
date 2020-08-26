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
use Call\Suports\Helpers\LoadRouterHelper;
use Illuminate\Validation\Rule;

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
        $routes = LoadRouterHelper::make();
        return [
            FieldComponent::make('Name')->input()->datalist($routes)->rules(['required', Rule::unique('permissions','name')->ignore($this->getId())]),
        ];
    }
    public function route(){
        return "permissions";
    }

}
