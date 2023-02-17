<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/inicio', function () {
        return view('inicio');
    })->name('inicio');
});

Route::get('/logout', function () {
    // Lógica de redirección personalizada aquí
    return redirect('/inicio');
})->middleware(['web']);

Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios');

Route::get('/equipo', [EquipoController::class, 'index'])->name('equipo');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');