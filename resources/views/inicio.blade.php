<x-app-layout>

    <div class="w-full h-96" style="position: relative; background-color: #0e1218; background-size: 200% auto;">

        {{-- Particulas cuadradas de fondo --}}
        <div id="particles-js" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>

        {{-- Redondel que gira en el header --}}
        <div class="loading-spinner"></div>

        <div class="grid grid-cols-1 h-96 justify-center items-center">
            <div class="text-center">
                <h1 class="md:block z-40 text-5xl text-white font-extrabold animate__animated animate__backInDown py-4 mt-40 sm:pt-40 md:pt-20">
                    <span
                        class="font-extrabold text-transparent sm:text-6xl md:text-8xl bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">
                        ESTUDIO PUGLIARES
                    </span>
                    <br>
                    <span class="font-extrabold text-transparent text-8xl bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600 opacity-5 absolute">
                    </span>

                    <span class="effect-text">
                        <span>P</span>
                        <span>U</span>
                        <span>G</span>
                        <span>L</span>
                        <span>I</span>
                        <span>A</span>
                        <span>R</span>
                        <span>E</span>
                        <span>S</span>
                    </span>

                </h1>

                <!-- Mostrar el texto en LG y tamaños más grandes -->
                <p class="hidden xl:block w-auto text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-800 mt-10 animate__animated animate__backInDown">
                    Comprometidos con tu <span id="cambio-texto" class="text-white"> Éxito </span> financiero
                </p>
                <!-- Mostrar el texto en celulares -->
                <p class="xl:hidden w-auto text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-800 mt-4 animate__animated animate__backInDown">
                    Comprometidos con tu <span class="text-white"> Éxito </span> financiero
                </p>

            </div>
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="padding-bottom: -2px; z-index: -1;">
        <path fill="#0e1218" fill-opacity="1" d="M0,192L48,170.7C96,149,192,107,288,80C384,53,480,43,576,58.7C672,75,768,117,864,138.7C960,160,1056,160,1152,154.7C1248,149,1344,139,1392,133.3L1440,128L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>


    {{-- Servicios --}}
    <span id="servicios">
        @livewire('service')
    </span>
    {{-- Fin Servicios --}}

    <!-- Sección de Quiénes somos -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="padding-bottom: -2px; z-index: -1;">
        <path fill="#c184fb" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>

    <span id="somos">
        @livewire('somos')
    </span>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="padding-bottom: -2px; z-index: -1;">
        <path fill="#db2777" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,154.7C384,181,480,203,576,181.3C672,160,768,96,864,101.3C960,107,1056,181,1152,181.3C1248,181,1344,107,1392,69.3L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>
    <!-- Fin Sección de Quiénes somos -->

    <!-- Sección de Contacto -->
    <span id="contacto">
        @livewire('contacto')
    </span>
    <!-- Fin Sección de Contacto -->

    {{-- Ultimas noticias del Blog --}}
    @livewire('blog-inicio')
    {{-- Ultimas noticias del Blog --}}
    
    <!-- Pie de Página -->
    @livewire('footer')
    <!-- Fin Pie de Página -->

    

    {{-- La directiva script está en app.blade.php esto permite que al cargar la pagína principal de la plantilla se
    ejecute el js en ese momento --}}
    @push('script')

        <script src="/assets/js/javascript.js"></script>

    @endpush

</x-app-layout>