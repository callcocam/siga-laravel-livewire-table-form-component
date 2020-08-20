<?php


namespace Call\Commands;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeInstall extends AbstractCommand
{

    protected $signature = 'make:call-install';
    protected $description = 'Make install all package.';

    protected function getStub()
    {
        return null;
    }


    public function handle()
    {
        $this->call('vendor:publish',[
            '--force' => true,
            '--tag' => 'lw-call-scaffolding'
        ]);

        $this->call('vendor:publish',[
            '--force' => true,
            '--tag' => 'lw-call-migrations'
        ]);

        $this->call('vendor:publish',[
            '--force' => true,
            '--tag' => 'tag=dist-assets'
        ]);

        $this->call('vendor:publish',[
            '--force' => true,
            '--tag' => 'lw-call-package'
        ]);

        $this->call('vendor:publish',[
            '--force' => true,
            '--tag' => 'lw-call-views'
        ]);

        $this->call('vendor:publish',[
            '--force' => true,
            '--tag' => 'lw-call'
        ]);

    }
}
