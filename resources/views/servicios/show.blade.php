<x-app-layout>

    {{-- Mercado Pago --}}
    @php        
        
        // SDK de Mercado Pago
        require base_path('vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();
        $preference->notification_url = route('notification', $services);
        // Crea un ítem en la preferencia    
        // $SERVICE ES LA VARIABLE QUE ENVIAMOS DEL CONTROLADOR CON LOS DATOS DEL SERVICIO.
        $item = new MercadoPago\Item();
        $item->title = $services->titulo;
        $item->quantity = 1;
        $item->unit_price = $services->precio;

        $preference->back_urls = array(
            "success" => route('pay', $services),
            "failure" => "http://www.tu-sitio/failure",
            "pending" => "http://www.tu-sitio/pending"
        );
        $preference->auto_return = "approved";

        $preference->items = array($item);
        $preference->save();
    
    @endphp
  
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-40">
        <ul>
            <li class="w-full rounded-lg overflow-hidden shadow-lg bg-white flex flex-col justify-between mx-6 h-full">
                <div class="relative px-6 py-4 h-full">
                    <article>
                        <h1 class="text-3xl text-center mx-4 my-8 font-bold bg-gradient-to-r from-violet-600 to-fuchsia-700 bg-clip-text text-transparent mb-4 uppercase">
                            {{ $services->titulo }}
                        </h1>
                        <p class="text-gray-600 text-lg h-full">
                            {{ $services->descripcion_larga}}
                        </p>
                        <span class="flex flex-col items-center py-10 text-2xl">
                            {{-- Logica ocultar o mostrar si hay descuento o no --}}
                            @if($services->descuento)
                                <span class="text-gray-800 font-semibold text-base">
                                    A PARTIR DE
                                </span>
                                <span class="text-gray-400 font-semibold mb-2 line-through">
                                    ${{ number_format($services->precio_tachado, 0, ',', '.') }}
                                </span>
                                <span class="text-gray-800 font-semibold">
                                    CON DESCUENTO
                                </span>
                                <span class="text-white text-sm font-semibold bg-yellow-400 px-2 py-2 border-b-4 border-yellow-600">
                                    Sólo por el mes de <span class="uppercase">{{ $mes_actual }}</span>
                                </span>

                                <span class="text-gray-600 my-4 px-4 text-4xl rounded-br-lg font-semibold">
                                    ${{ number_format($services->precio, 0, ',', '.') }}
                                </span>
                            @else

                                <span class="mt-12">
                                    <span class="text-gray-800 font-semibold text-base">
                                        A PARTIR DE
                                    </span>
                                    <span class="text-gray-600 my-4 px-4 text-4xl rounded-br-lg font-semibold">
                                        ${{ number_format($services->precio, 0, ',', '.') }}
                                    </span>
                                </span>

                            @endif 
                            
                            {{-- Botón de pago Mercado Pago --}}
                            <div id="wallet_container"></div>

                        </span>
                    </article>
                </div>
            </li>
        </ul>
    </div>

    {{-- SDK MercadoPago.js --}}
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("{{ config('services.mercadopago.key') }}");
        const bricksBuilder = mp.bricks();
        mp.bricks().create("wallet", "wallet_container", {
            initialization: {
                preferenceId: "{{ $preference->id }}",
                redirectMode: "modal"
            },
        })
    </script>
    
</x-app-layout>
