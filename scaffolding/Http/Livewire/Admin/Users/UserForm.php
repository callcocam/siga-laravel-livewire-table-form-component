<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Admin\Users;

use App\User;
use Call\LaravelLivewireForms\FormComponent;
use Call\LaravelLivewireForms\Fields\Component\FieldComponent;
use Illuminate\Support\Facades\Hash;

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
        return [
            FieldComponent::make('id')->input('hidden')->view("fields.hidden"),
            FieldComponent::make('Name')->input()->rules('required'),
            FieldComponent::make('Email')->input()->rules('required'),
            FieldComponent::make('Cover')->file()->multiple()->rules('required'),
            FieldComponent::make('Password')->input('password'),
        ];
    }

    public function route(){
        return "users";
    }
}
