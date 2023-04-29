<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /* Para aplicar permisos segun el rol y segun lo que puede realizar cada usuario aplicamos el middleware en cada método */
    public function __construct()
    {
        /* En este caso aplicamos el permiso sólo al index */
        $this->middleware('can:admin.servicios.index')->only('index');
        $this->middleware('can:admin.servicios.create')->only('create', 'store');
        /* En este caso aplicamos el permiso sólo al edit y update */
        $this->middleware('can:admin.servicios.edit')->only('edit', 'update');
        $this->middleware('can:admin.servicios.destroy')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Services::all();
        return view('admin.servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'slug' => 'required|unique:services',
            'descripcion_corta' => 'required|string|max:255',
            'descripcion_larga' => 'required|string',
            'descuento' => 'required',
            'planes' => 'required',
            'precio_tachado' => 'required|numeric|min:0',
            'precio' => 'required|numeric|min:0',
        ]);
        
        $servicio = Services::create($request->all());

        return redirect()->route('admin.servicios.create')->with('success', 'El servicio se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $servicio)
    {
        return view('admin.servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $servicio)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'slug' => "required|unique:services,slug,$servicio->id",
            'descripcion_corta' => 'required|string|max:255',
            'descripcion_larga' => 'required|string',
            'descuento' => 'required',
            'planes' => 'required',
            'precio_tachado' => 'required|numeric|min:0',
            'precio' => 'required|numeric|min:0'            
        ]);

        $servicio->update($request->all());

        return redirect()->route('admin.servicios.edit', $servicio)->with('success', 'El servicio se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $servicio)
    {
        $servicio->delete();
        return redirect()->route('admin.servicios.index')->with('success', 'El servicio se eliminó con éxito.');
    }
}
