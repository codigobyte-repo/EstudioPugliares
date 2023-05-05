<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function index()
    {
        $usuario = auth()->user();
        $orders = $usuario->orders;

        $perfil = auth()->user()->userDetails;

        return view('pedidos.compras', compact('usuario','orders', 'perfil'));
    }
    
}
