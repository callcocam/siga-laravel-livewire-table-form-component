<?php


namespace Call\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeCrud extends Command
{

    protected $signature = 'make:crud {name} {--model=Model}';
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

        if (!File::exists(app_path("%s.php", $this->option('model')))) {
            $this->call('make:model',[
                'name' => $this->option('model'),
                '-m' => true
            ]);
            $this->call('make:factory',[
                'name' => sprintf("%sFactory",$this->option('model')),
                '--model' => $this->option('model')
            ]);
        }
    }
}
