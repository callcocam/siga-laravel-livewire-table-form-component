<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms;

use Call\LaravelLivewireForms\Fields\Component\FieldComponent;
use Call\LaravelLivewireForms\Traits\FollowsRules;
use Call\LaravelLivewireForms\Traits\HandlesArrays;
use Call\LaravelLivewireForms\Traits\UploadsFiles;
use Call\LaravelLivewireTables\Traits\WithParameters;
use Call\LivewireAlert\Traits\LivewireAlert;
use Illuminate\Support\Arr;
use Livewire\Component;

abstract class FormComponent extends Component
{
    use FollowsRules, UploadsFiles, HandlesArrays, WithParameters, LivewireAlert;
    protected $test = false;
    protected $result = false;
    protected $prefix = "admin";
    protected $messagesCreate="Record created successfully :)!!";
    protected $messagesUpdate="Record updated successfully :)";
    protected $messages;
    protected $model;
    public $datList =[];
    public $form_data;
    public $form = [];
    private static $storage_disk;
    private static $storage_path;

    protected $listeners = ['fileUpdate'];


    public function setFormProperties($model = null)
    {

        if ($model){
            $this->model = $model;

            $this->form_data = $this->model->toArray();
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

    public function getId(){

        return $this->getFormDataKey('id');

    }

    public function datList(){

        return $this->datList;

    }

    public function title()
    {
        return "Basic Form";
    }

    public function subtitle(){
        return null;
    }

    public function action(){
        if($this->getId())
            return "Edit";

        return "Create";
    }

    public function BackList()
    {
        return route(sprintf('admin.%s.index', $this->route()),$this->getUpdatesQueryParametersClean());
    }


    public function formTemplate()
    {
        return form_views("form-component");
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
        if($this->getId()){
            try{
                $this->model = $this->query()->where('id',$this->getId())->first();

                $this->model->update($this->getFillable());
                $this->result = true;
                //$this->saveUpload();
                $this->alert($this->messagesUpdate);
                //notify()->success($this->messagesUpdate);
            }
            catch (\PDOException $PDOException){
                $this->result = false;
                $this->error($PDOException->getMessage());
                //notify()->error($PDOException->getMessage());
            }
        }
        else{
            try{
                $this->model = $this->query()->create($this->getFillable());
                $this->result = true;
               //$this->saveUpload();
                //notify()->success($this->messagesCreate);
                $this->alert($this->messagesCreate);
            }
            catch (\PDOException $PDOException){
                $this->result = false;
                $this->error($PDOException->getMessage());
                //notify()->error($PDOException->getMessage());
            }

        }

    }

    public function saveAndStay()
    {
        $this->submit();
        $this->saveAndStayResponse();
    }

    public function GoBack()
    {
        return redirect()->route(sprintf('admin.%s.index', $this->route()),$this->getUpdatesQueryParametersClean());
    }


    public function GoBackEdit()
    {
        return redirect()->back()->withInput();
    }


    public function GoBackCreate()
    {
        return redirect()->route(sprintf('admin.%s.create', $this->route()));
    }

    /**
     * Save and create new register
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveAndStayResponse()
    {
        $this->submit();
        return $this->GoBackCreate();
    }

    /**
     * Save and back index
     */
    public function saveAndGoBack()
    {
        $this->submit();

        $this->GoBack();
    }

    /**
     * Save and edit response
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveAndGoBackResponse()
    {
        $this->submit();
        return $this->GoBackEdit();
    }


   abstract public function route();

    public function query()
    {
        if(is_null($this->model)){
           return null;
        }

        if(is_string($this->model)){
            $this->model = app($this->model())->query();
        }
        return $this->model;
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
        foreach ($this->fields() as $field) {
            if(!$field->isDivider()){
                $field_names[] = $field->name;
            }
        }
        $this->form_data = Arr::only($this->form_data, $field_names);
    }

    public function getFormDataKey($key){

        if(!$this->form_data)
            return null;

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

    public function fieldsAdd($fields =[]){

        if($fields):
            foreach ($fields as $field):
                 $this->fieldAdd($field);
            endforeach;;

        endif;

        return $this;
    }
    public function fieldAdd(FieldComponent $filed){

        if($this->test):
            if(!$filed->default)
               $filed->default($filed->label);
        endif;

        $this->form[$filed->name] = $filed;

        return $this;
    }

    protected function getFillable(){
        $field_names = [];
        foreach ($this->query()->getModel()->getFillable() as $field) {
            if(isset($this->form_data[$field]))
                $field_names[$field] = $this->form_data[$field];
        }

        return $field_names;
    }

}
