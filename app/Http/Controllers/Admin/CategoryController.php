<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    /* Para aplicar permisos segun el rol y segun lo que puede realizar cada usuario aplicamos el middleware en cada método */
    public function __construct()
    {
        /* En este caso aplicamos el permiso sólo al index */
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create', 'store');
        /* En este caso aplicamos el permiso sólo al edit y update */
        $this->middleware('can:admin.categories.edit')->only('edit', 'update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');

    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
        
        $category = Category::create($request->all());

        return redirect()->route('admin.categories.create')->with('success', 'La categoría se ha creado correctamente.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:categories,slug,$category->id"
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.edit', $category)->with('success', 'La categoría se ha actualizado correctamente.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'La categoría se eliminó con éxito.');
    }
}
