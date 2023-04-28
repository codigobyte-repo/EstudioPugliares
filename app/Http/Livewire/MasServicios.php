<?php

namespace App\Http\Livewire;

use App\Models\Services;
use Livewire\Component;
use Carbon\Carbon;

class MasServicios extends Component
{
    public function render()
    {

        $mes_actual = Carbon::now()->locale('es_ES')->isoFormat('MMMM');

        $empresariales = Services::where('planes', 1)->get();
        $independientes = Services::where('planes', 2)->get();
        $profesionales = Services::where('planes', 3)->get();

        return view('livewire.mas-servicios', compact('empresariales', 'independientes', 'profesionales', 'mes_actual'));
    }
}
