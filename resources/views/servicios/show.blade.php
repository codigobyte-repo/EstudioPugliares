<x-app-layout>
  
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
                            {{-- Logica ocultar o mostrar si hay descuento o no --}}    
                        </span>

                        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 text-center">
                            <a href="#" class="relative inline-flex items-center px-12 py-0 md:py-3 overflow-hidden text-lg font-medium text-gray-800 border-2 border-gray-500 rounded-full hover:text-white group hover:bg-gray-50">
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
            </li>
        </ul>
    </div>
    
</x-app-layout>
