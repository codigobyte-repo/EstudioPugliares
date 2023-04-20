<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contacto;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        
        $UserCount = User::count();

        $PostCount = Post::count();

        $MensajesCount = Contacto::count();

        return view('admin.index', compact('UserCount', 'PostCount', 'MensajesCount'));

    }
}
