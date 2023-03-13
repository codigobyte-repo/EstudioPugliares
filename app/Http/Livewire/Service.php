<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Services;

class Service extends Component
{
    public function render()
    {
        $servicios = Services::all();
        return view('livewire.services', compact('servicios'));
    }
}
