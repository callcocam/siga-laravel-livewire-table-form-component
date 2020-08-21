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
use Illuminate\Validation\Rule;

class ProfileForm extends FormComponent
{
    public function query()
    {
        return User::query();
    }

    public function formTemplate()
    {
        return form_views("form-profile-component");
    }

    public function mount(User $model = null)
    {
        $profile = $model->find(auth()->id());
        $this->setFormProperties( $profile );
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
        $data_fields['id'] =  FieldComponent::make('id')->hidden();
        $data_fields['slug'] = FieldComponent::make('slug')->hidden();

        $data_fields['type'] = FieldComponent::make('Type')->default('cpf')->radio([
            'Fisíca'=>'cpf',
            'Jurídica'=>'cnpj',
        ])->rules('required');

        $data_fields['cover'] = FieldComponent::make('Cover')->multiple()->cover();
        $data_fields[] = FieldComponent::make('Name')->input()->rules('required');
        if($this->getFormDataKey('type')){
            if($this->getFormDataKey('type') == 'cnpj'){
                $data_fields[] = FieldComponent::make('Nome Fantasia','fantasy')->input();
                $data_fields[] = FieldComponent::make('CNPJ','document')->input();
                $data_fields[] = FieldComponent::make('Inscrição Estadual(IE)','ie')->input();
                $data_fields[] = FieldComponent::make('Site','site')->input();
            }
            else{
                $data_fields[] = FieldComponent::make('CPF','document')->input();
                $data_fields[] = FieldComponent::make('Registro Geral (RG)','rg')->input();
            }
        }
        else{
            $data_fields[] = FieldComponent::make('CPF','document')->input();
            $data_fields[] = FieldComponent::make('rg')->input();
        }
        $data_fields[] = FieldComponent::make('E-Mail','email')->input();
        $data_fields[] = FieldComponent::make('Telefone','phone')->input();
        $data_fields[] = FieldComponent::make('Status')->default('published')->radio([
            'Publicado'=>'published',
            'Rascunho'=>'draft',
        ])->rules('required');
        $data_fields[] = FieldComponent::make('description')->textarea();

        return $data_fields;
    }


    public function route(){
        return "users";
    }

}
