<?php


namespace Call\Commands;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class MakeRoute extends AbstractCommand
{

    protected $signature = 'makeApp:route {name} {--model=Model}';
    protected $description = 'Make a new Laravel Livewire table component.';

    protected function getStub()
    {
        return File::get(__DIR__ . '/../../storage/stubs/routes.stub');
    }
    public function handle()
    {
        $namespaceAndName = $this->argument('name');

        $explode = explode("/", $namespaceAndName);

        $name = Arr::last($explode);
        
        $stub = $this->getStub();
        $stub = str_replace('DummyRoute', strtolower($name), $stub);
        $path = app_path(sprintf('Http/Livewire/routes/%s.php', strtolower($name)));
        File::ensureDirectoryExists(app_path('Http/Livewire/routes'));
        if (!File::exists($path) || $this->confirm($name . ' already exists. Overwrite it?')) {
            File::put($path, $stub);
            $this->info($name . ' was made!');
        }
    }
}
