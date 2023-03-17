<div>
    <section class="bg-white py-2">

        <div class="max-w-500 mx-auto px-4 sm:px-6 lg:px-8 mb-16">

            <div class="text-center">
                <h1 class="sm:text-3xl md:text-6xl font-bold color-texto">Nuestros <span class="bg-gradient-to-br from-purple-400 to-pink-600 p-2 text-white">SERVICIOS</span></h1>

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
                                <div class="px-6 py-4 h-full">
                                    <article>
                                        <h1 class="text-2xl font-bold bg-gradient-to-r from-violet-600 to-fuchsia-700 bg-clip-text text-transparent mb-4 uppercase">
                                            {{ $servicio->titulo }}
                                        </h1>
                                        <p class="text-gray-600 text-lg h-full">
                                            {{ $servicio->descripcion}}
                                        </p>
                                    </article>
                                </div>
                                <div class="px-6 pt-4 pb-6 bg-gradient-to-r from-black to-gray-800 flex justify-center items-end w-full">
                                    <a href="#" class="text-lg font-semibold text-white hover:text-purple-500">Ver más</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <button aria-label="Previous" class="glider-prev">«</button>
                    <button aria-label="Next" class="glider-next">»</button>
                    <div role="tablist" class="dots"></div>
                </div>
            </div>

            <div class="text-center py-16">
                <span class="text-2xl text-gray-300 font-bold"> >>> </span> 
                <button class="px-5 py-4 text-2xl font-medium text-center text-white transition duration-500 ease-in-out transform bg-gradient-to-br from-purple-400 to-pink-600 lg:px-10 rounded-full">Ver más servicios</button> 
                <span class="text-2xl text-gray-300 font-bold"> <<< </span>
            </div>

        </div>
    </section>
</div>
