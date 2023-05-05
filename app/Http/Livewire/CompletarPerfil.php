<?php

namespace App\Http\Livewire;

use App\Models\UserDetails;
use Livewire\Component;

class CompletarPerfil extends Component
{
    public $compania;
    public $telefono;

    public function render()
    {
        return view('livewire.completar-perfil');
    }

    protected $rules = [
        
        'compania' => 'required|string',
        'telefono' => 'required|string',
    ];

    public function save()
    {
        $this->validate();

        UserDetails::create([
            'compania' => $this->compania,
            'telefono' => $this->telefono,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('pedidos');
        
    }
}
