<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ServiciosController extends Controller
{
    public function index()
    {
        return view('servicios.index');
    }

    public function show(Services $services)
    {
        $mes_actual = Carbon::now()->locale('es_ES')->isoFormat('MMMM');
        return view('servicios.show', compact('services', 'mes_actual'));
    }
}
