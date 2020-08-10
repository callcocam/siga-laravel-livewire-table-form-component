<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms;


use Call\LaravelLivewireForms\Traits\FollowsRules;
use Call\LaravelLivewireForms\Traits\HandlesArrays;
use Call\LaravelLivewireForms\Traits\UploadsFiles;
use Illuminate\Support\Arr;
use Livewire\Component;

abstract class FormComponent extends Component
{
    use FollowsRules, UploadsFiles, HandlesArrays;

    protected $prefix = "admin";
    protected $model;
    public $route;
    public $form_data;
    private static $storage_disk;
    private static $storage_path;

    protected $listeners = ['fileUpdate'];

    public function mount($model = null)
    {
        $this->setFormProperties($model);
    }

    public function setFormProperties($model = null)
    {

        if ($model){
            $model = $this->query()->find($model);
            $this->form_data = $model->toArray();
        }

        foreach ($this->fields() as $field) {
            if (!isset($this->form_data[$field->name])) {
                $array = in_array($field->type, ['checkbox', 'file']);
                $this->form_data[$field->name] = $field->default ?? ($array ? [] : null);
            }
        }
    }

    public function render()
    {
        return $this->formView();
    }

    public function formView()
    {
        return view($this->formTemplate(), [
            'fields' => $this->fields(),
        ]);
    }

    public function formTemplate()
    {
        return "lw-forms::form-component";
    }

   abstract public function fields();

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules(true));
    }

    public function submit()
    {
        $this->validate($this->rules());

       $this->getFormData();

        $this->success();
    }

    public function errorMessage($message)
    {
        return str_replace('form data.', '', $message);
    }

    public function success()
    {

        if(isset($this->form_data['id']) && $this->form_data['id']){
         return $this->query()->update($this->form_data);
        }
        else{

            return $this->query()->create($this->form_data);
        }

    }

    public function saveAndStay()
    {
        $this->submit();
        $this->saveAndStayResponse();
    }

    public function saveAndStayResponse()
    {
        if($this->route)
            return redirect()->route(sprintf('admin.%s.create', $this->route));

        return redirect()->back();
    }

    public function saveAndGoBack()
    {
        $this->submit();
        $this->saveAndGoBackResponse();
    }

    public function saveAndGoBackResponse()
    {
        if($this->route)
            return redirect()->route($this->getRoute());

        return redirect()->back();
    }

    public function query()
    {
        if(is_string($this->model) || is_null($this->model)){
            $this->model = app($this->model())->query();
        }
        return $this->model;
    }

    /**
     * @param string $action
     * @return mixed
     */
    public function getRoute($action="index")
    {
        if($this->prefix){
            return sprintf('%s.%s.%s',$this->prefix, $this->route, $action);
        }
        return sprintf('%s.%s',$this->route, $action);
    }

    public function model(){

        return null;
    }
    public function social_login()
    {
        return [];
    }
    public function getFormData(){
        $field_names = [];
        foreach ($this->fields() as $field) $field_names[] = $field->name;
        $this->form_data = Arr::only($this->form_data, $field_names);
    }
    public function getFormDataKey($key){

           if(!$this->form_data)
               $this->getFormData();

           if(isset($this->form_data[$key]))
               return $this->form_data[$key];

           return null;
    }

    public function filled($key)
    {
        $keys = is_array($key) ? $key : func_get_args();

        foreach ($keys as $value) {
            if (empty($value)) {
                return false;
            }
        }

        return true;
    }

}
