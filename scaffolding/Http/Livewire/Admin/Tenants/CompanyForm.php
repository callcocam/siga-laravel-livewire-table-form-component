<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Admin\Tenants;

use App\Company;
use Call\LaravelLivewireForms\FormComponent;
use Call\LaravelLivewireForms\Fields\Component\FieldComponent;

class CompanyForm extends FormComponent
{
    public function query()
    {
        return Company::query();
    }


    public function mount(Company $model)
    {

        $this->setFormProperties($model);
    }

    public function fields()
    {
        $data_form = [];
        $data_form[] =  FieldComponent::make('id')->hidden();
        $data_form[] = FieldComponent::make('slug')->hidden();
        $data_form[] = FieldComponent::make('user_id')->default(auth()->id())->hidden();


        $data_form[] = FieldComponent::make('Cover')->cover();
        $data_form[] = FieldComponent::make('Name')->input()->rules('required');
        $data_form[] = FieldComponent::make('Nome Fantasia','fantasy')->input();
        $data_form[] = FieldComponent::make('CNPJ','document')->input();
        $data_form[] = FieldComponent::make('Inscrição Estadual(IE)','ie')->input();
        $data_form[] = FieldComponent::make('Site','site')->input();
        $data_form[] = FieldComponent::make('E-Mail','email')->input();
        $data_form[] = FieldComponent::make('Telefone','phone')->input();
        $data_form[] = FieldComponent::make('Status')->default('published')->radio([
            'Publicado'=>'published',
            'Rascunho'=>'draft',
        ])->rules('required');
        $data_form[] = FieldComponent::make('description')->textarea();

        return $data_form;
    }
    public function route(){
        return "companies";
    }

}
