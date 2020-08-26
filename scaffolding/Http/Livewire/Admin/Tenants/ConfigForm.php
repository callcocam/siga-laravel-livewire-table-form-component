<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Admin\Tenants;

use App\Company;
use Call\LaravelLivewireForms\Fields\Component\ChildComponent;
use Call\LaravelLivewireForms\FormComponent;
use Call\LaravelLivewireForms\Fields\Component\FieldComponent;

class ConfigForm extends FormComponent
{
    public function query()
    {
        return Company::query();
    }


    public function formTemplate()
    {
        return form_views("form-config-component");
    }

    public function mount(Company $model)
    {
        $data = $model->where('user_id', auth()->id())->first();
        $data->append('address');
        $this->setFormProperties( $data );
    }

    public function success()
    {
        parent::success();
        if($this->result){
            if(isset($this->form_data['address']) && $this->form_data['address']){
                $this->form_data['address'] = $this->saveChild($this->model->address(), $this->form_data['address']);
            }
        }

    }
    public function fields()
    {
        $data_fields[]=  FieldComponent::make('id')->hidden();
        $data_fields[]=  FieldComponent::make('Name')->input()->rules('required');
        $data_fields[]=  FieldComponent::make('Fantasy')->input();
        $data_fields[]=  FieldComponent::make('Document')->input();
        $data_fields[]=  FieldComponent::make('Ie')->input();
        $data_fields[]=  FieldComponent::make('Email')->input();
        $data_fields[]=  FieldComponent::make('Phone')->input();
        $data_fields[]=  FieldComponent::make('Site')->input();
        $data_fields[]=  FieldComponent::make('Status')->radio([
            'Published'=>'published',
            'Draft'=>'draft',
        ]);
        $data_fields[] = FieldComponent::make('Endereço Completo','address')->child([
            ChildComponent::make('id')->hidden(),
            ChildComponent::make('slug')->hidden(),
            ChildComponent::make('name')->input(),
            ChildComponent::make('Street')->input(),
            ChildComponent::make('District')->input(),
            ChildComponent::make('Number')->input(),
            ChildComponent::make('Zip')->input(),
            ChildComponent::make('City')->input(),
            ChildComponent::make('State')->input(),
            ChildComponent::make('Complement')->input(),
        ]);
        return $data_fields;
    }
    public function route(){
        return "tenants";
    }

}
