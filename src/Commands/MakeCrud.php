<?php


namespace Call\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeCrud extends Command
{

    protected $signature = 'make:crud {name} {--model=Model} {--default=1}';
    protected $description = 'Make a new Laravel Crud Livewire component.';

    public function handle()
    {

        $arguments = [
            'name' => $this->argument('name'),
            '--model' => $this->option('model')
        ];

        $this->call('makeApp:form',$arguments);
        $this->call('makeApp:table',$arguments);
        $this->call('makeApp:route',$arguments);
        if($this->option('default')){
            $this->call('makeApp:model',$arguments);
        }

    }
}
