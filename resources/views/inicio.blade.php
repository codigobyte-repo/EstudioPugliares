<x-app-layout>

    <div class="w-full min-h-screen bg-no-repeat bg-cover bg-left bg-fixed"
        style="position: relative; background-size: 200% auto;">

        {{-- Particulas cuadradas de fondo --}}
        <div id="particles-js" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>

        {{-- Redondel que gira en el header --}}
        <div class="loading-spinner"></div>

        <div class="grid grid-cols-1 min-h-screen justify-center items-center">
            <div class="text-center">
                <h1 class="md:block z-40 text-5xl text-white font-extrabold animate__animated animate__backInDown py-4">
                    <span
                        class="font-extrabold text-transparent text-8xl bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">
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

                <p class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-800 mt-10 animate__animated animate__backInDown whitespace-nowrap lg:whitespace-normal">
                    Comprometidos con tu <span id="cambio-texto" class="text-white"> éxito </span> financiero
                </p>
            </div>
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-bottom: -1px; z-index: -1;">
        <path fill="#ffffff" fill-opacity="1"
            d="M0,192L60,165.3C120,139,240,85,360,90.7C480,96,600,160,720,154.7C840,149,960,75,1080,58.7C1200,43,1320,85,1380,106.7L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
        </path>
    </svg>


    {{-- Servicios --}}
    @livewire('service')

    <!-- Sección de Quiénes somos -->
    <section class="bg-gray-600 py-10">
        <div class="container mx-auto px-6">
            
            <h2 class="text-4xl font-bold mb-2 text-gray-800">Quiénes somos</h2>
            
            <p class="text-xl mb-8 text-gray-500">Somos una empresa especializada en brindar soluciones tecnológicas
                para empresas y particulares.</p>
            <ul class="list-disc list-inside mb-8">
                <li>Nos enfocamos en la satisfacción de nuestros clientes.</li>
                <li>Contamos con un equipo de profesionales altamente capacitados.</li>
                <li>Ofrecemos un amplio catálogo de servicios.</li>
            </ul>
            
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Ver nuestros servicios
            </button>
        </div>
    </section>

    <!-- Sección de Contacto -->
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
            <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Contacto
            </h1>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <!-- Formulario de Contacto -->
            <div class="flex flex-wrap -mx-2">
                <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-first-name" type="text" placeholder="Nombre">
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="text" placeholder="Apellido">
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-email" type="email" placeholder="Correo electrónico">
                </div>
                <div class="w-full md:w-1/2 px-2">
                    <textarea
                        class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"
                        id="grid-message" placeholder="Mensaje"></textarea>
                </div>
                <div class="w-full md:w-full flex items-start px-3">
                    <div class="-mr-1">
                        <button
                            class="flex items-center justify-center bg-purple-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Enviar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pie de Página -->
    <footer class="bg-gray-200">
        <div class="container mx-auto px-6 py-3">
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/4 text-center md:text-left ">
                    <h5 class="uppercase mb-6 font-bold">Enlaces</h5>
                    <ul class="mb-4">
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-purple-500">Inicio</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-purple-500">Quiénes Somos</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-purple-500">Servicios</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-purple-500">Contacto</a>
                        </li>
                    </ul>
                </div>

                <div class="w-full md:w-1/4 text-center md:text-left">
                    <h5 class="uppercase mb-6 font-bold">Legal</h5>
                    <ul class="mb-4">
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-purple-500">Términos y
                                Condiciones</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-purple-500">Política de
                                Privacidad</a>
                        </li>
                    </ul>
                </div>

                <div class="w-full md:w-1/4 text-center md:text-left">
                    <h5 class="uppercase mb-6 font-bold">Redes Sociales</h5>
                    <ul class="mb-4">
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-purple-500">Facebook</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-purple-500">Instagram</a>
                        </li>
                        <li class="mt-2">
                            <a href="#" class="hover:underline text-gray-600 hover:text-purple-500">Twitter</a>
                        </li>
                    </ul>
                </div>

                <div class="w-full md:w-1/4 text-center md:text-left">
                    <h5 class="uppercase mb-6 font-bold">Contáctanos</h5>
                    <p class="mt-2 mb-2">contacto@miempresa.com</p>
                    <p class="mt-2 mb-2">+1 (123) 456-7890</p>
                    <p class="mt-2 mb-2">Calle Falsa 123</p>
                </div>
            </div>
        </div>
    </footer>

    {{-- La directiva script está en app.blade.php esto permite que al cargar la pagína principal de la plantilla se
    ejecute el js en ese momento --}}
    @push('script')

        <script src="/assets/js/javascript.js"></script>

    @endpush

</x-app-layout>