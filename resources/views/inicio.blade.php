<x-app-layout>

    <div class="bg-fixed">
        <video autoplay muted loop class="w-full h-full object-cover absolute top-0 left-0 z-0">
            <source src="/videos/background.mp4" type="video/mp4">
            {{-- Si el video no se ve, muestra la imagen --}}
            <img src="{{ asset('images/background-movile.jpg') }}" alt="Imagen de fondo" />
        </video>


        <div class="grid grid-cols-1 justify-center items-center">
            <div class="text-center">
                <h1 class="md:block z-40 text-5xl text-white font-extrabold animate__animated animate__backInDown py-4 mt-40 sm:pt-40 md:pt-20">
                    <span
                        class="font-extrabold text-transparent sm:text-6xl md:text-8xl bg-clip-text bg-gradient-to-b from-yellow-400 via-yellow-600 to-gray-700">
                        ESTUDIO PUGLIARES
                    </span>
                    <br>
                </h1>

                <!-- Mostrar el texto en LG y tamaños más grandes -->
                <p class="hidden uppercase xl:block w-auto text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-b from-yellow-400 via-yellow-600 to-gray-700 mt-10 animate__animated animate__backInDown">
                    Comprometidos con tu <span id="cambio-texto" class="bg-gradient-to-r from-yellow-200 to-yellow-900 bg-clip-text text-transparent font-bold text-4xl"> Éxito </span> financiero
                </p>
                <!-- Mostrar el texto en celulares -->
                <p class="xl:hidden uppercase w-auto text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-b from-yellow-400 via-yellow-600 to-gray-700 mt-4 animate__animated animate__backInDown">
                    Comprometidos con tu <span class="bg-gradient-to-r from-yellow-200 to-yellow-900 bg-clip-text text-transparent font-bold text-3xl"> Éxito </span> financiero
                </p>

            </div>
        </div>
    </div>
    
    @livewire('service')
    
    @livewire('somos')

    @livewire('contacto')
    
    

    {{-- Ultimas noticias del Blog --}}
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top: -8%;">
        <path fill="#f3f4f5" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
    @livewire('blog-inicio')
    {{-- Ultimas noticias del Blog --}}
    
    <!-- Pie de Página -->
    @livewire('footer')
    <!-- Fin Pie de Página -->

    

    {{-- La directiva script está en app.blade.php esto permite que al cargar la pagína principal de la plantilla se
    ejecute el js en ese momento --}}
    @push('script')

        {{-- <script src="/assets/js/javascript.js"></script> --}}

    @endpush

</x-app-layout>