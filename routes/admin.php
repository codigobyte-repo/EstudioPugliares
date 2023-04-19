<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

/* Los midleware en este caso se puede agregar aquí ya que aplica el mismo permiso para todos */
Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

/* Los middlewares en este caso ya que hay permisos distintos se va a aplicar en el controlador */
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

Route::resource('contacts', ContactsController::class)->names('admin.contacts');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('tags', TagController::class)->names('admin.tags');

Route::resource('posts', PostController::class)->except('show')->names('admin.posts');