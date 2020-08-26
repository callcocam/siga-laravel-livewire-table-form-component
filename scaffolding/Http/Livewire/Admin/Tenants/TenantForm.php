<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Admin\Tenants;

use App\Tenant;
use Call\LaravelLivewireForms\FormComponent;
use Call\LaravelLivewireForms\Fields\Component\FieldComponent;

class TenantForm extends FormComponent
{
    public function query()
    {
        return Tenant::query();
    }


    public function mount(Tenant $model)
    {

        $this->setFormProperties($model);
    }

    public function fields()
    {
        return [
            FieldComponent::make('id')->hidden(),
            FieldComponent::make('Name')->input()->rules('required'),
            FieldComponent::make('Cover')->file()->rules('required')->multiple(),
            FieldComponent::make('Email')->input()->rules('required'),
        ];
    }

    public function route()
    {
        return "tenants";
    }
}
