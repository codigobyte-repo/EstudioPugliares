<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class OrderApproved extends Component
{
    public $name;
    public $email;
    public $compania;
    public $telefono;
    public $password;
    public $password_confirmation;

    public $order;

    public function mount($order)
    {
        $this->order = $order;
    }
    public function render()
    {
        return view('livewire.order-approved');
    }

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email',
        
        'compania' => 'required|string',
        'telefono' => 'required|string',
        
        'password' => 'min:6|same:password_confirmation',
    ];

    public function save()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);

        UserDetails::create([
            'compania' => $this->compania,
            'telefono' => $this->telefono,
            'user_id' => $user->id
        ]);

        $order = Order::findOrFail($this->order->id);
        $order->update(['user_id' => $user->id]);

        return redirect()->route('pedidos');
        
    }
}
