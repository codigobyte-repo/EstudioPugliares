<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class MenuBlog extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.menu-blog', compact('categories'));
    }
}
