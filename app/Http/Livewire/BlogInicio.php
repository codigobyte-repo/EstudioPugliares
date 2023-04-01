<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class BlogInicio extends Component
{
    public function render()
    {
        $posts = Post::where('status', 2)->latest('id')->paginate(6);
        
        return view('livewire.blog-inicio', compact("posts"));
    }
}
