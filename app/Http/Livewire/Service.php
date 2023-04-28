<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Services;
use Carbon\Carbon;

class Service extends Component
{
    public function render()
    {
        $mes_actual = Carbon::now()->locale('es_ES')->isoFormat('MMMM');
        $servicios = Services::all();
        return view('livewire.services', compact('servicios', 'mes_actual'));
    }
}
