<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Livewire\Admin\Utils;

use Livewire\Component;

class Loading extends Component
{
    public $class="";
    public function mount($class=""){
        $this->class = $class;
    }
    public function render()
    {

        return view(call_views('loading'));
    }
}
