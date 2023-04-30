<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Footer extends Component
{
    public $buttonText = 'Copiar correo electrónico';

    public function render()
    {
        $categories = Category::take(5)->get();
        $tags = Tag::take(5)->get();
        $posts = Post::take(5)->get();
        return view('livewire.footer', compact('categories', 'tags', 'posts'));
    }

    public function copy()
    {
        $this->buttonText = '¡Copiado!';
    }
}
