<?php

namespace App\Http\Controllers;

use App\Mail\VentasMaillable;
use App\Models\Order;
use App\Models\Services;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use MercadoPago\Config\Json;

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

    public function order($order)
    {
        return view('orders.payment', compact($order));
    }

    /* Notificacion de mercado pago */
    public function notification(Services $services,Request $request)
    {
        // Obtener los datos de la notificación en formato JSON
        $data = json_decode($request->getContent(), true);

        // Obtener el estado del pago
        $paymentStatus = $data['data']['status'];
        $payment_id = $data['data']['payment_id'];

        // Si el estado es "approved", el pago se ha realizado exitosamente
        if ($paymentStatus == 'approved') {
            $order = new Order();
            $order->titulo = $services->titulo;
            $order->precio = $services->precio;
            $order->precio = $services->precio;
            $order->referencia_pago = $payment_id;
            $order->user_id = auth()->user()->id;
            $order->save();
            return redirect()->route('pedidos');            
        }

        // Responder con un código HTTP 200 para indicar que se ha recibido la notificación correctamente
        return response()->json(['status' => 'ok'], 200);
    }

    /* Pago Mercado Pago */
    public function pay(Services $services, Request $request)
    {
        $payment_id = $request->get('payment_id');

        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=TEST-8386572955066116-043018-59c74ab9bc2859325bb4801aedd48420-1364175300");

        $response = json_decode($response);

        $status = $response->status;
        
        Mail::to('maquino@codigobyte.com.ar')->send(new VentasMaillable($services->titulo, $services->precio));

        /* if($status == 'approved'){
            return redirect()->route('pedidos');
        } */

        if($status == 'approved'){
            $order = new Order();
            $order->titulo = $services->titulo;
            $order->precio = $services->precio;
            $order->precio = $services->precio;
            $order->referencia_pago = $payment_id;
            if(auth()->user()){
                $order->user_id = auth()->user()->id;
                $order->save();
                return redirect()->route('pedidos');
            }
            $order->save();

            return redirect()->route('approved', $order);
        }
    }

    public function approved(Order $order)
    {
        return view('orders.approved', compact('order'));
    }
}
