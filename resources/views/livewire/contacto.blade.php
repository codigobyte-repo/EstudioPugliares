<div id="contacto">
    <section class="bg-white py-2">

        <div class="px-4 sm:px-6 lg:px-8 mb-16">

            <div class="text-center">
                
                <h1 class="text-3xl md:text-6xl font-bold mt-40 text-gray-600">Contactar <span class="bg-gradient-to-r from-slate-500 to-slate-800 p-2 text-white">EQUIPO</span></h1>

                {{-- Efecto CSS public -> asset -> css -> efectos.css--}}
                <div class="circle-container mt-4">
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="circle"></div>
                </div>

                <p class="mt-2 text-lg md:text-2xl text-gray-600">"¡No esperes más para resolver tus dudas, contáctanos y estaremos encantados de ayudarte!"</p>
            </div>

            <div class="mt-12 container mx-auto">

                
                <div class="grid sm:grid-cols-1 md:grid-cols-1 xl:grid-cols-3 gap-0">

                    <div class="hidden lg:block">
                        <img class="h-auto" src="{{asset('assets/img/cel.png')}}" alt="Blob">
                    </div>
    
                    <!-- Formulario de Contacto -->
                    @livewire('captcha-component')

                </div>


            </div>
        </div>

    </section>
</div>