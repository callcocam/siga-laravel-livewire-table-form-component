<?php


namespace Call\LaravelLivewireTables\Commands;


use Call\Commands\AbstractCommand;

class MakeTable extends AbstractCommand
{

    protected $signature = 'makeApp:table {name} {--model=Model}';
    protected $description = 'Make a new Laravel Livewire table component.';
    protected $type="Table";

    protected function getStub()
    {
        return __DIR__ . '/../../../storage/stubs/table.stub';
    }
}
