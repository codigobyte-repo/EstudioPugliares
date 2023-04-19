<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    /* En la paginación si nos vamos a otra página y utilizamos el buscador, la misma no busca en otras páginas
    por eso creamos la siguiente función que detecta cuando se usa la propiedad $search y la función hace que la 
    página se resetee y de esa forma funciona el buscador en todas las paginaciones */
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                    ->latest('id')
                    ->paginate();

        return view('livewire.admin.users-index', compact('users'));
    }
}
