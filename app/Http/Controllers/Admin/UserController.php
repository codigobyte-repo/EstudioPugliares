<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /* Para aplicar permisos segun el rol y segun lo que puede realizar cada usuario aplicamos el middleware en cada método */
    public function __construct()
    {
        /* En este caso aplicamos el permiso sólo al index */
        $this->middleware('can:admin.users.index')->only('index');
        /* En este caso aplicamos el permiso sólo al edit y update */
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }
    
    public function update(User $user, Request $request)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index')->with('success', 'Rol creado éxitosamente.');
    }
}
