<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('inicio');
});

/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/inicio', function () {
        return view('inicio');
    })->name('inicio');
}); */

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');

Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');

Route::get('/blog', [PostController::class, 'index'])->name('blog');

Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios');

Route::get('/equipo', [EquipoController::class, 'index'])->name('equipo');

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');

Route::get('/logout', function () {
    // Lógica de redirección personalizada aquí
    return redirect('/inicio');
})->middleware(['web']);
