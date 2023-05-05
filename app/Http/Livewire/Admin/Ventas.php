<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

use Livewire\WithPagination;

class Ventas extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $ordenes = Order::where('titulo', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('created_at', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('referencia_pago', 'LIKE', '%' . $this->search . '%')
                        ->latest('id')
                        ->paginate();

        return view('livewire.admin.ventas', compact('ordenes'));
    }
}
