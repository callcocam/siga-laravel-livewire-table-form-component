<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Admin\Users;

use App\Permission;
use App\Role;
use Call\LaravelLivewireForms\FormComponent;
use Call\LaravelLivewireForms\Fields\Component\FieldComponent;

class RoleForm extends FormComponent
{
    public function query()
    {
        return Role::query();
    }

    public function success()
    {
        parent::success();
        if($this->result){
            if(isset($this->form_data['access']) && $this->form_data['access']){
                $this->model->permissions()->sync(array_values($this->form_data['access']));
            }
        }

    }


    public function mount(Role $model)
    {

        $model->append('access');
        $this->setFormProperties($model);
    }

    public function fields()
    {

        $permissions = Permission::orderBy('name')->get()->pluck('id', 'name')->all();
        $data_fields['id'] =  FieldComponent::make('id')->hidden();
        $data_fields['slug'] = FieldComponent::make('slug')->hidden();
        $data_fields['name'] = FieldComponent::make('Name')->input()->rules('required');
        if($permissions){
            $data_fields['permissions'] =  FieldComponent::make('Permissions', 'access')->checkboxes($permissions)->default($this->form_data['access'])->help('Please select a roles.');
        }

        $data_fields['description'] = FieldComponent::make('Name')->textarea();
        return $data_fields;
    }
    public function route(){
        return "roles";
    }

}
