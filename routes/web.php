<?php

use App\Http\Controllers\EditorController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\WebhooksController;
use App\Http\Livewire\MasServicios;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

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
Route::get('/detalle/{services}', [ServiciosController::class, 'show'])->name('servicio.detalle');
/* llamada a livewire */
Route::get('mas-servicios', MasServicios::class)->name('mas-servicios');

/* Rutas mercado pago */
/* Evaluar esta funcionalidad */
Route::get('servicios/{order}', [ServiciosController::class, 'order'])->name('order');

Route::post('notification/{services}', [ServiciosController::class, 'notification'])->name('notification');

Route::get('servicios/{services}/pay', [ServiciosController::class, 'pay'])->name('pay');

Route::get('servicios/{order}/approved', [ServiciosController::class, 'approved'])->name('approved');

Route::get('pedidos', [PedidosController::class, 'index'])->name('pedidos');

Route::post('webhooks', WebhooksController::class);

Route::get('/equipo', [EquipoController::class, 'index'])->name('equipo');

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');

Route::get('/logout', function () {
    // Lógica de redirección personalizada aquí
    return redirect('/inicio');
})->middleware(['web']);

Route::post('/upload', [EditorController::class, 'upload'])->name('ckeditor.upload');
