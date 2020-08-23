<?php

namespace App\Http\Livewire\Admin\Utils;

use Livewire\Component;

class Icons extends Component
{
    public function render()
    {
        return view(table_views('utils.icons'));
    }
}
