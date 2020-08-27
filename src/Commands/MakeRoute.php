<?php


namespace Call\Commands;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeRoute extends AbstractCommand
{

    protected $signature = 'makeApp:route {name} {--model=Model}';
    protected $description = 'Make a new Laravel Livewire table component.';

    protected function getStub()
    {
        return __DIR__ . '/../../storage/stubs/menus.stub';
    }


    protected function getStubRouet()
    {
        return __DIR__ . '/../../storage/stubs/routes.stub';
    }

    public function handle()
    {
        $namespaceAndName = $this->argument('name');

        $explode = explode("/", $namespaceAndName);

        $name = Arr::last($explode);
        $app = Arr::first($explode);

        $menuIndex = count($explode);

        $menuName = $name;
        if($menuIndex>1){
            $menuIndex = ($menuIndex-2);
            if($menuIndex){
                $menuName = $explode[$menuIndex];
            }
        }

        $stub = File::get($this->getStub());
        $stub = str_replace('DummyApp', strtolower($app), $stub);
        $stub = str_replace('DummyMenu', $name, $stub);
        $stub = str_replace('DummyModelCase', strtolower($menuName), $stub);
        $stub = str_replace('DummyModel', $menuName, $stub);
        $stub = str_replace('DummyRoute', strtolower($name), $stub);
        $path = app_path(sprintf('Http/Livewire/Menus/%sMenu.php', $name));
        File::ensureDirectoryExists(app_path('Http/Livewire/Menus'));
        if (!File::exists($path) || $this->confirm($name . ' already menus exists. Overwrite it?')) {
            File::put($path, $stub);
            $this->info($name . ' menus was made!');
        }
        $stub = File::get($this->getStubRouet());

        $stub = str_replace('DummyModel', strtolower($menuName), $stub);
        $stub = str_replace('DummyRoute', strtolower($name), $stub);
        $path = base_path(sprintf('routes/livewire/auth/%s.php', strtolower($name)));
        File::ensureDirectoryExists(base_path('routes/livewire'));
        File::ensureDirectoryExists(base_path('routes/livewire/auth'));
        if (!File::exists($path) || $this->confirm($name . ' already route exists. Overwrite it?')) {
            File::put($path, $stub);
            $this->info($name . ' route was made!');
        }
    }
}
