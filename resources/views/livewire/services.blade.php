<div id="servicios">
    <section class="bg-white mt-28">

        <div class="max-w-500 mx-auto px-4 sm:px-6 lg:px-8 mb-16">

            <div class="text-center">
                <h1 class="text-3xl md:text-6xl font-bold text-gray-600">Nuestros <span class="bg-gradient-to-r from-slate-500 to-slate-800 p-2 text-white">SERVICIOS</span></h1>

                {{-- Efecto CSS public -> asset -> css -> efectos.css--}}
                {{-- <div class="circle-container mt-4">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div> --}}

                <p class="mt-2 text-lg md:text-2xl text-gray-600">Te ofrecemos una amplia variedad de servicios contables y
                    financieros para hacer crecer tu negocio</p>
            </div>

            <div class="flex justify-between text-gray-600">
                <div class="ml-32 w-8 h-8 bg-cover bg-center" style="background-image: url('/images/desliza-izquierda.png')"></div>
                <div class="mr-32 w-8 h-8 bg-cover bg-center" style="background-image: url('/images/desliza-derecha.png')"></div>
            </div>
            <div class="mt-12">
                <div>
                    <img class="absolute w-1/2 right-0 top-3/6 h-3/4 opacity-5" src="{{asset('assets/img/circle.svg')}}" alt="Blob">
                </div>                
                <div class="glider-contain">
                    <ul class="glider">
                        @foreach ($servicios as $servicio)
                            <li class="w-full rounded-lg overflow-hidden shadow-lg bg-white flex flex-col justify-between mx-6 h-full">
                                <div class="relative px-6 py-4 h-full">
                                    <article>
                                        <h1 class="text-3xl text-center mx-4 my-8 font-bold bg-gradient-to-r from-violet-600 to-fuchsia-700 bg-clip-text text-transparent mb-4 uppercase">
                                            {{ $servicio->titulo }}
                                        </h1>
                                        <p class="text-gray-600 text-lg h-full">
                                            {{ $servicio->descripcion_corta}}
                                        </p>
                                        <span class="flex flex-col items-center py-10 text-2xl">
                                            {{-- Logica ocultar o mostrar si hay descuento o no --}}
                                            @if($servicio->descuento)
                                                <span class="text-gray-800 font-semibold text-base">
                                                    A PARTIR DE
                                                </span>
                                                <span class="text-gray-400 font-semibold mb-2 line-through">
                                                    ${{ number_format($servicio->precio_tachado, 0, ',', '.') }}
                                                </span>
                                                <span class="text-gray-800 font-semibold">
                                                    CON DESCUENTO
                                                </span>
                                                <span class="text-white text-sm font-semibold bg-yellow-600 px-2 py-2 border-b-4 border-yellow-400">
                                                    Sólo por el mes de <span class="uppercase">{{ $mes_actual }}</span>
                                                </span>

                                                <span class="text-gray-600 my-4 px-4 text-4xl rounded-br-lg font-semibold">
                                                    ${{ number_format($servicio->precio, 0, ',', '.') }}
                                                </span>
                                            @else

                                                <span class="mt-12">
                                                    <span class="text-gray-800 font-semibold text-base">
                                                        A PARTIR DE
                                                    </span>
                                                    <span class="text-gray-600 my-4 px-4 text-4xl rounded-br-lg font-semibold">
                                                        ${{ number_format($servicio->precio, 0, ',', '.') }}
                                                    </span>
                                                </span>

                                            @endif
                                            {{-- Logica ocultar o mostrar si hay descuento o no --}}    
                                        </span>

                                        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 text-center">
                                            <a href="{{ route('servicio.detalle', $servicio) }}" class="relative inline-flex items-center px-12 py-0 md:py-3 overflow-hidden text-lg font-medium text-gray-800 border-2 border-gray-500 rounded-full hover:text-white group hover:bg-gray-50">
                                                <span class="absolute left-0 block w-full h-0 transition-all bg-green-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
                                                <span class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>  
                                                </span>
                                                <span class="relative">Pagar ahora</span>
                                            </a>
                                        </div>
                                    </article>
                                </div>
                                <div class="px-6 pt-4 pb-6 bg-gradient-to-r from-black to-gray-800 flex justify-center items-end w-full">
                                    <a href="{{ route('servicio.detalle', $servicio) }}" class="text-lg font-semibold text-white hover:text-slate-500">VER DETALLES</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <button aria-label="Previous" class="glider-prev">«</button>
                    <button aria-label="Next" class="glider-next">»</button>
                    <div role="tablist" class="dots"></div>
                </div>
            </div>

            <div class="text-center mt-16">
                <span class="text-2xl text-gray-300 font-bold"> >>> </span> 
                {{-- <a href="{{ url('ver-servicios') }}" class="px-5 py-4 text-2xl font-medium text-center text-white transition duration-500 ease-in-out transform bg-gradient-to-br from-purple-400 to-pink-600 lg:px-10 rounded-full">Ver más servicios</a>  --}}
                <a href="{{ url('mas-servicios') }}" class="relative px-10 py-4 font-bold text-white group">
                    <span class="absolute inset-0 w-full h-full transition duration-300 ease-out transform -translate-x-2 -translate-y-2 bg-gradient-to-r from-slate-500 to-slate-800 group-hover:translate-x-0 group-hover:translate-y-0"></span>
                    <span class="absolute inset-0 w-full h-full border-4 border-black"></span>
                    <span class="relative text-yellow-500">VER MÁS SERVICIOS</span>
                </a>
                <span class="text-2xl text-gray-300 font-bold"> <<< </span>
                
            </div>

        </div>
    </section>
</div>
