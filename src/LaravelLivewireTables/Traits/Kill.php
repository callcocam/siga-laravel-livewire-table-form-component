<?php


namespace Call\LaravelLivewireTables\Traits;


trait Kill
{


    public $confirming;

    public $classDelete = 'btn btn-danger btn-sm';
    public $classDeleteConfirm = 'btn btn-warning btn-sm';

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        try {
            $this->query()->find($id)->delete();
            $this->alert('success', $this->messagesDelete);
        }catch (\Exception $exception){
            $this->alert('error', $exception->getMessage());

        }
    }
}
