<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use Livewire\Component;

class SubscribeForm extends Component
{
    public $name;
    public $email;

    public function render()
    {
        return view('livewire.subscribe-form');
    }

    public function subscribe()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('success', '¡Gracias por suscribirte!');
        $this->reset();
    }
}
