<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cotizaciones extends Component
{
    public $data;

    public function mount()
    {
        $url = 'https://api.bluelytics.com.ar/v2/latest';
        $this->data = json_decode(file_get_contents($url), true);
    }
    
    public function render()
    {
        return view('livewire.cotizaciones');
    }
}
