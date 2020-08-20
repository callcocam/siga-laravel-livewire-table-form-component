<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Admin\Users;

use App\Role;
use App\User;
use Call\LaravelLivewireForms\FormComponent;
use Call\LaravelLivewireForms\Fields\Component\FieldComponent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserForm extends FormComponent
{
    public function query()
    {
        return User::query();
    }


    public function mount(User $model = null)
    {
        $this->setFormProperties($model);
    }

    public function success()
    {
        if(isset($this->form_data['password']) && $this->form_data['password']){
            $this->form_data['password'] = Hash::make($this->form_data['password']);
        }
        else{
            unset($this->form_data['password']);
        }
        return parent::success();
    }

    public function fields()
    {
        $roles = Role::orderBy('name')->get()->pluck('id', 'name')->all();
        return [
            FieldComponent::make('id')->input('hidden')->view('fields.hidden'),
            FieldComponent::make('Name')->input()->rules(['required', 'string', 'max:255']),
            FieldComponent::make('Email')->input('email')
                ->rules(['required', 'string', 'email', 'max:255', Rule::unique('users','email')->ignore($this->getId())]),
            FieldComponent::make('Roles', 'roles')->checkboxes($roles)->help('Please select a roles.'),
            FieldComponent::make('Password')->input('password'),
            FieldComponent::make('Description')->textarea(5),
        ];
    }

    public function route(){
        return "users";
    }
}
