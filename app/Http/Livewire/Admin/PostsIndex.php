<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;

use Livewire\WithPagination;

class PostsIndex extends Component
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
        $posts = Post::where('user_id', auth()->user()->id)
                    ->where('name', 'LIKE', '%' . $this->search . '%')
                    ->latest('id')
                    ->paginate();

        return view('livewire.admin.posts-index', compact('posts'));
    }
}
