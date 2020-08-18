<?php


namespace Call\Commands;

use Call\Database\Schema\SchemaManager;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class MakeModel extends AbstractCommand
{

    protected $signature = 'makeApp:model {name} {--model=Model}';
    protected $description = 'Make a new Laravel Livewire form component.';
    protected $type="";

    public function handle()
    {

        $stub = $this->getStub();
        $name = $this->option('model');
        $fillables = '//';
        $tableName = sprintf("%ss",strtolower($name));
        if(SchemaManager::tableExists($tableName)){
            $columns = SchemaManager::listTableColumnNames($tableName);
            unset($columns['id']);
            unset($columns['tenant_id']);
            $fillables = implode("','",$columns);
            $fillables = "'{$fillables}'";
        }

        $stub = str_replace('DummyFillable', $fillables, $stub);
        $stub = str_replace('DummyModel', $name, $stub);
        $path = app_path(sprintf('%s.php', $name));
        File::ensureDirectoryExists(app_path());
        if (!File::exists($path) || $this->confirm($name . ' already exists. Overwrite it?')) {
            File::put($path, $stub);
            $this->info($name . ' was made!');
        }
        
        if (!File::exists(app_path("%s.php", $name))) {
            $this->call('make:factory',[
                'name' => sprintf("%sFactory",$this->option('model')),
                '--model' => $this->option('model')
            ]);
            
           // if(!class_exists("Create{$this->option('model')}sTable")){
           //     $this->call('make:migration',[
          //          'name' => sprintf("create_%ss_table", strtolower($this->option('model'))),
          //      ]);
          //  }
        }
    }

    protected function getStub()
    {
         $stub =  File::get(__DIR__ . '/../../storage/stubs/model.stub');
       
        return $stub;
    }
}
