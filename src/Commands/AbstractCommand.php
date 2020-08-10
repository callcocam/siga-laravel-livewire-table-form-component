<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Call\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

abstract class AbstractCommand extends Command
{


    public function handle()
    {
        $namespaceAndName = $this->argument('name');

        $explode = explode("/", $namespaceAndName);

        $name = Arr::last($explode);

        $namespace = Str::before($namespaceAndName, sprintf("/%s",$name));

        $namespace = ucwords($namespace, '/');

        $stub = File::get($this->getStub());
        $stub = str_replace('DummyNameSpace', str_replace("/", "\\", sprintf("App\Http\Livewire\%s", $namespace)), $stub);
        $stub = str_replace('DummyComponent', $name, $stub);
        $stub = str_replace('DummyModel', $this->option('model'), $stub);
        $stub = str_replace('DummyRoute', Str::slug(Str::plural($this->option('model'))), $stub);
        $path = app_path('Http/Livewire/' . $namespaceAndName.'.php');

        File::ensureDirectoryExists(app_path(str_replace("\\", "/", sprintf("Http\Livewire\%s", $namespace))));

        if (!File::exists($path) || $this->confirm($name . ' already exists. Overwrite it?')) {
            File::put($path, $stub);
            $this->info($name . ' was made!');
        }
    }

    abstract protected function getStub();
}
