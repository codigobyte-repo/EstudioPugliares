<x-app-layout>

    {{-- Mercado Pago --}}
    @php        
        
        // SDK de Mercado Pago
        require base_path('vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();
        
        //Enviamos una notificación de pago a la ruta  agregamos la nueva orden asi
        //Las notificaciones no funcionan hay que ver mejor este punto
        //$preference->notification_url = route('notification', $services);

        // Crea un ítem en la preferencia    
        // $SERVICE ES LA VARIABLE QUE ENVIAMOS DEL CONTROLADOR CON LOS DATOS DEL SERVICIO.
        $item = new MercadoPago\Item();
        $item->title = $services->titulo;
        $item->quantity = 1;
        $item->unit_price = $services->precio;

        $preference->back_urls = array(
            "success" => route('pay', $services),
            /* "failure" => "http://www.tu-sitio/failure",
            "pending" => "http://www.tu-sitio/pending" */
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
                            
                            @auth
                                {{-- Botón de pago Mercado Pago --}}
                                <div id="wallet_container"></div>
                            @else
                                {{-- Loguearse si no está registrado --}}
                                <div class="flex items-center">
                                    <a href="{{ route('login') }}" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-gray-400 rounded-lg hover:bg-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                        </svg>                          
                                        <span class="ml-2">Iniciar sesión para abonar el servicio</span>
                                    </a>
                                    <span class="ml-2 text-xs">¿No estás registrado? <a class="text-blue-600 cursor-pointer font-semibold" href="{{ route('register') }}">Registrarse</a></span>
                                </div>
                            @endauth

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
