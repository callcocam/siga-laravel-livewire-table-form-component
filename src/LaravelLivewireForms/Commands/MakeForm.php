<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\LaravelLivewireForms\Commands;

use Call\Commands\AbstractCommand;
use Illuminate\Support\Facades\File;

class MakeForm extends AbstractCommand
{
    protected $signature = 'makeApp:form {name} {--model=Model}';
    protected $description = 'Make a new Laravel Livewire form component.';
    protected $type="Form";

    protected function getStub()
    {
        return File::get( __DIR__ . '/../../../storage/stubs/form.stub');
    }
}
