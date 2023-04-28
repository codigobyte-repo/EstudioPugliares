<div id="servicios">
    <section class="bg-white">

        <div class="max-w-500 mx-auto px-4 sm:px-6 lg:px-8 mb-16">

            <div class="text-center">
                <h1 class="text-3xl md:text-6xl font-bold color-texto">Nuestros <span class="bg-gradient-to-br from-purple-400 to-pink-600 p-2 text-white">SERVICIOS</span></h1>

                {{-- Efecto CSS public -> asset -> css -> efectos.css--}}
                <div class="circle-container mt-4">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div>

                <p class="mt-2 text-lg text-gray-600">Te ofrecemos una amplia variedad de servicios contables y
                    financieros para hacer crecer tu negocio</p>
            </div>

            <div class="mt-12">
                <div>
                    <img class="absolute w-1/2 right-0 top-3/4 opacity-5" src="{{asset('assets/img/circle.svg')}}" alt="Blob">
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
                                            {{ $servicio->descripcion_larga}}
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
                                                <span class="text-white text-sm font-semibold bg-yellow-400 px-2 py-2 border-b-4 border-yellow-600">
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
                                            <a href="#" class="relative inline-flex items-center px-12 py-0 md:py-3 overflow-hidden text-lg font-medium text-indigo-600 border-2 border-indigo-600 rounded-full hover:text-white group hover:bg-gray-50">
                                                <span class="absolute left-0 block w-full h-0 transition-all bg-indigo-600 opacity-100 group-hover:h-full top-1/2 group-hover:top-0 duration-400 ease"></span>
                                                <span class="absolute right-0 flex items-center justify-start w-10 h-10 duration-300 transform translate-x-full group-hover:translate-x-0 ease">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                                </span>
                                                <span class="relative">Adquirir ahora</span>
                                            </a>
                                        </div>
                                    </article>
                                </div>
                                <div class="px-6 pt-4 pb-6 bg-gradient-to-r from-black to-gray-800 flex justify-center items-end w-full">
                                    <a href="{{ route('servicio.detalle', $servicio) }}" class="text-lg font-semibold text-white hover:text-purple-500">VER DETALLES</a>
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
                <a href="{{ url('mas-servicios') }}" class="relative px-10 py-4 font-bold text-black group">
                    <span class="absolute inset-0 w-full h-full transition duration-300 ease-out transform -translate-x-2 -translate-y-2 bg-red-300 group-hover:translate-x-0 group-hover:translate-y-0"></span>
                    <span class="absolute inset-0 w-full h-full border-4 border-black"></span>
                    <span class="relative">Ver más servicios</span>
                </a>
                <span class="text-2xl text-gray-300 font-bold"> <<< </span>
                
            </div>

        </div>
    </section>
</div>
