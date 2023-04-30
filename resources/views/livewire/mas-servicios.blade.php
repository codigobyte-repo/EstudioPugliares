<div>
    <section class="pt-40">

        <div class="max-w-500 mx-auto px-4 sm:px-6 lg:px-8 mb-16">

            <div class="text-center mb-20 bg-gray-100 py-20">
                <h1 class="text-3xl md:text-6xl font-bold color-texto"><span class="text-gray-600 mr-1">Nuestros</span><span class="bg-gradient-to-r from-slate-500 to-slate-800 p-2 text-white">Servicios</span></h1>

                {{-- Efecto CSS public -> asset -> css -> efectos.css--}}
                <div class="circle-container mt-4">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div>

                <p class="mt-2 text-lg md:text-2xl text-gray-600">Nos enorgullece brindar soluciones personalizadas que se adapten a tus necesidades y metas específicas</p>
            </div>

            <div>

                @if (count($empresariales) > 0)
                    <div class="mt-12 py-12">
                        
                        <div class="text-center mb-14">
                            <h1 class="text-4xl text-gray-600">Soluciones 
                                <span class="text-gray-600 font-bold text-4xl uppercase border-b-4 border-b-blue-800 bg-white px-2 py-2">empresariales</span>
                            </h1>
                        </div>

                        <div class="glider-contain">
                            <ul class="gliderService">
                                @foreach ($empresariales as $empresarial)
                                    <li class="w-full rounded-lg overflow-hidden shadow-lg bg-white flex flex-col justify-between mx-6 h-full">
                                        <div class="relative px-6 py-4 h-full">
                                            <article>
                                                <h1 class="text-3xl text-center my-8 font-bold bg-gradient-to-r from-violet-600 to-fuchsia-700 bg-clip-text text-transparent mb-4 uppercase">
                                                    {{ $empresarial->titulo }}
                                                </h1>
                                                <p class="text-gray-600 text-lg h-full">
                                                    {{ $empresarial->descripcion_corta}}
                                                </p>
                                                <span class="flex flex-col items-center py-10 text-2xl">
                                                    {{-- Logica ocultar o mostrar si hay descuento o no --}}
                                                    @if($empresarial->descuento)
                                                        <span class="text-gray-800 font-semibold text-base">
                                                            A PARTIR DE
                                                        </span>
                                                        <span class="text-gray-400 font-semibold mb-2 line-through">
                                                            ${{ number_format($empresarial->precio_tachado, 0, ',', '.') }}
                                                        </span>
                                                        <span class="text-gray-800 font-semibold">
                                                            CON DESCUENTO
                                                        </span>
                                                        <span class="text-white text-sm font-semibold bg-yellow-600 px-2 py-2 border-b-4 border-yellow-400">
                                                            Sólo por el mes de <span class="uppercase">{{ $mes_actual }}</span>
                                                        </span>

                                                        <span class="text-gray-600 my-4 px-4 text-4xl rounded-br-lg font-semibold">
                                                            ${{ number_format($empresarial->precio, 0, ',', '.') }}
                                                        </span>
                                                    @else

                                                        <span class="mt-12">
                                                            <span class="text-gray-800 font-semibold text-base">
                                                                A PARTIR DE
                                                            </span>
                                                            <span class="text-gray-600 my-4 px-4 text-4xl rounded-br-lg font-semibold">
                                                                ${{ number_format($empresarial->precio, 0, ',', '.') }}
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
                                        <div class="px-6 pt-4 pb-6 bg-gradient-to-r from-black to-gray-800 flex justify-center items-end w-full">
                                            <a href="{{ route('servicio.detalle', $empresarial) }}" class="text-lg font-semibold text-white hover:text-slate-500">VER DETALLES</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <button aria-label="Previous" class="glider-prev">«</button>
                            <button aria-label="Next" class="glider-next">»</button>
                            <div role="tablist" class="dots"></div>
                        </div>
                        
                    </div>

                    <hr class="my-12 h-0.5 border-t-0 bg-neutral-100 opacity-100 dark:opacity-50" />
                @endif

                @if (count($independientes) > 0)
                    <div class="mt-12 py-12">

                        <div class="text-center mb-14">
                            <h1 class="text-4xl text-gray-600">Soluciones 
                                <span class="text-gray-600 font-bold text-4xl uppercase border-b-4 border-b-blue-800 bg-white px-2 py-2">independientes</span>
                            </h1>
                        </div>

                        <div class="glider-contain">
                            <ul class="gliderIndependiente">
                                
                                @foreach ($independientes as $independiente)
                                    <li class="w-full rounded-lg overflow-hidden shadow-lg bg-white flex flex-col justify-between mx-6 h-full">
                                        <div class="relative px-6 py-4 h-full">
                                            <article>
                                                <h1 class="text-3xl text-center my-8 font-bold bg-gradient-to-r from-violet-600 to-fuchsia-700 bg-clip-text text-transparent mb-4 uppercase">
                                                    {{ $independiente->titulo }}
                                                </h1>
                                                <p class="text-gray-600 text-lg h-full">
                                                    {{ $independiente->descripcion_corta}}
                                                </p>
                                                <span class="flex flex-col items-center py-10 text-2xl">
                                                    {{-- Logica ocultar o mostrar si hay descuento o no --}}
                                                    @if($independiente->descuento)
                                                        <span class="text-gray-800 font-semibold text-base">
                                                            A PARTIR DE
                                                        </span>
                                                        <span class="text-gray-400 font-semibold mb-2 line-through">
                                                            ${{ number_format($independiente->precio_tachado, 0, ',', '.') }}
                                                        </span>
                                                        <span class="text-gray-800 font-semibold">
                                                            CON DESCUENTO
                                                        </span>
                                                        <span class="text-white text-sm font-semibold bg-yellow-400 px-2 py-2 border-b-4 border-yellow-600">
                                                            Sólo por el mes de <span class="uppercase">{{ $mes_actual }}</span>
                                                        </span>

                                                        <span class="text-gray-600 my-4 px-4 text-4xl rounded-br-lg font-semibold">
                                                            ${{ number_format($independiente->precio, 0, ',', '.') }}
                                                        </span>
                                                    @else

                                                        <span class="mt-12">
                                                            <span class="text-gray-800 font-semibold text-base">
                                                                A PARTIR DE
                                                            </span>
                                                            <span class="text-gray-600 my-4 px-4 text-4xl rounded-br-lg font-semibold">
                                                                ${{ number_format($independiente->precio, 0, ',', '.') }}
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
                                        <div class="px-6 pt-4 pb-6 bg-gradient-to-r from-black to-gray-800 flex justify-center items-end w-full">
                                            <a href="{{ route('servicio.detalle', $independiente) }}" class="text-lg font-semibold text-white hover:text-slate-500">VER DETALLES</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <button aria-label="Previous" class="glider-prev">«</button>
                            <button aria-label="Next" class="glider-next">»</button>
                            <div role="tablist" class="dots"></div>
                        </div>
                        
                    </div>

                    <hr class="my-12 h-0.5 border-t-0 bg-neutral-100 opacity-100 dark:opacity-50" />
                @endif

                @if (count($profesionales) > 0)
                    <div class="mt-12 py-12">

                        <div class="text-center mb-14">
                            <h1 class="text-4xl text-gray-600">Soluciones 
                                <span class="text-gray-600 font-bold text-4xl uppercase border-b-4 border-b-blue-800 bg-white px-2 py-2">profesionales</span>
                            </h1>
                        </div>

                        <div class="glider-contain">
                            <ul class="gliderProfesionales">
                                @foreach ($profesionales as $profesional)
                                    <li class="w-full rounded-lg overflow-hidden shadow-lg bg-white flex flex-col justify-between mx-6 h-full">
                                        <div class="relative px-6 py-4 h-full">
                                            <article>
                                                <h1 class="text-3xl text-center my-8 font-bold bg-gradient-to-r from-violet-600 to-fuchsia-700 bg-clip-text text-transparent mb-4 uppercase">
                                                    {{ $profesional->titulo }}
                                                </h1>
                                                <p class="text-gray-600 text-lg h-full">
                                                    {{ $profesional->descripcion_corta}}
                                                </p>
                                                <span class="flex flex-col items-center py-10 text-2xl">
                                                    {{-- Logica ocultar o mostrar si hay descuento o no --}}
                                                    @if($profesional->descuento)
                                                        <span class="text-gray-800 font-semibold text-base">
                                                            A PARTIR DE
                                                        </span>
                                                        <span class="text-gray-400 font-semibold mb-2 line-through">
                                                            ${{ number_format($profesional->precio_tachado, 0, ',', '.') }}
                                                        </span>
                                                        <span class="text-gray-800 font-semibold">
                                                            CON DESCUENTO
                                                        </span>
                                                        <span class="text-white text-sm font-semibold bg-yellow-400 px-2 py-2 border-b-4 border-yellow-600">
                                                            Sólo por el mes de <span class="uppercase">{{ $mes_actual }}</span>
                                                        </span>

                                                        <span class="text-gray-600 my-4 px-4 text-4xl rounded-br-lg font-semibold">
                                                            ${{ number_format($profesional->precio, 0, ',', '.') }}
                                                        </span>
                                                    @else

                                                        <span class="mt-12">
                                                            <span class="text-gray-800 font-semibold text-base">
                                                                A PARTIR DE
                                                            </span>
                                                            <span class="text-gray-600 my-4 px-4 text-4xl rounded-br-lg font-semibold">
                                                                ${{ number_format($profesional->precio, 0, ',', '.') }}
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
                                        <div class="px-6 pt-4 pb-6 bg-gradient-to-r from-black to-gray-800 flex justify-center items-end w-full">
                                            <a href="{{ route('servicio.detalle', $profesional) }}" class="text-lg font-semibold text-white hover:text-slate-500">VER DETALLES</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <button aria-label="Previous" class="glider-prev">«</button>
                            <button aria-label="Next" class="glider-next">»</button>
                            <div role="tablist" class="dots"></div>
                        </div>
                        
                    </div>
                @endif

            </div>
            
            
        </div>
        
        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top: -10%;">
            <path fill="#ffffff" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg> --}}

        @livewire('contacto')

        <div class="-mt-20">
            @livewire('footer')
        </div>

    </section>

    <script>
        new Glider(document.querySelector('.gliderService'), {
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: true,
            dots: '.dots',
            arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
            },
            responsive: [
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1.5,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1.5,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2.5,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 1280,
                    settings: {
                        slidesToShow: 3.5,
                        slidesToScroll: 3,
                    }
                },
            ]
        });
    </script>

<script>
    new Glider(document.querySelector('.gliderIndependiente'), {
        slidesToShow: 1,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots',
        arrows: {
        prev: '.glider-prev',
        next: '.glider-next'
        },
        responsive: [
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1.5,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1.5,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2.5,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 1280,
                settings: {
                    slidesToShow: 3.5,
                    slidesToScroll: 3,
                }
            },
        ]
    });
</script>

<script>
    new Glider(document.querySelector('.gliderProfesionales'), {
        slidesToShow: 1,
        slidesToScroll: 1,
        draggable: true,
        dots: '.dots',
        arrows: {
        prev: '.glider-prev',
        next: '.glider-next'
        },
        responsive: [
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1.5,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1.5,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2.5,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 1280,
                settings: {
                    slidesToShow: 3.5,
                    slidesToScroll: 3,
                }
            },
        ]
    });
</script>
</div>
