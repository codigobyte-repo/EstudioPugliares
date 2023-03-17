<x-app-layout>

    <div class="w-full h-96" style="position: relative; background-color: #0e1218; background-size: 200% auto;">

        {{-- Particulas cuadradas de fondo --}}
        <div id="particles-js" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>

        {{-- Redondel que gira en el header --}}
        <div class="loading-spinner"></div>

        <div class="grid grid-cols-1 h-96 justify-center items-center">
            <div class="text-center">
                <h1 class="md:block z-40 text-5xl text-white font-extrabold animate__animated animate__backInDown py-4 sm:pt-40 xl:pt-60">
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
    @livewire('service')
    {{-- Fin Servicios --}}

    <!-- Sección de Quiénes somos -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="padding-bottom: -2px; z-index: -1;">
        <path fill="#c184fb" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>

    @livewire('somos')

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="padding-bottom: -2px; z-index: -1;">
        <path fill="#db2777" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,154.7C384,181,480,203,576,181.3C672,160,768,96,864,101.3C960,107,1056,181,1152,181.3C1248,181,1344,107,1392,69.3L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>
    <!-- Fin Sección de Quiénes somos -->

    <!-- Sección de Contacto -->
    @livewire('contacto')
    <!-- Fin Sección de Contacto -->
    

    <!-- Pie de Página -->
    <div class="relative mt-16 bg-deep-purple-accent-400">
        <svg class="absolute top-0 w-full h-6 -mt-5 sm:-mt-10 sm:h-16 text-deep-purple-accent-400" preserveAspectRatio="none" viewBox="0 0 1440 54">
          <path fill="currentColor" d="M0 22L120 16.7C240 11 480 1.00001 720 0.700012C960 1.00001 1200 11 1320 16.7L1440 22V54H1320C1200 54 960 54 720 54C480 54 240 54 120 54H0V22Z"></path>
        </svg>
        <div class="px-4 pt-12 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
          <div class="grid gap-16 row-gap-10 mb-8 lg:grid-cols-6">
            <div class="md:max-w-md lg:col-span-2">
              <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
                <svg class="w-8 text-teal-accent-400" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" stroke="currentColor" fill="none">
                  <rect x="3" y="1" width="7" height="12"></rect>
                  <rect x="3" y="17" width="7" height="6"></rect>
                  <rect x="14" y="1" width="7" height="6"></rect>
                  <rect x="14" y="11" width="7" height="12"></rect>
                </svg>
                <span class="ml-2 text-xl font-bold tracking-wide text-gray-100 uppercase">Company</span>
              </a>
              <div class="mt-4 lg:max-w-sm">
                <p class="text-sm text-deep-purple-50">
                  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                </p>
                <p class="mt-4 text-sm text-deep-purple-50">
                  Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                </p>
              </div>
            </div>
            <div class="grid grid-cols-2 gap-5 row-gap-8 lg:col-span-4 md:grid-cols-4">
              <div>
                <p class="font-semibold tracking-wide text-teal-accent-400">
                  Category
                </p>
                <ul class="mt-2 space-y-2">
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">News</a>
                  </li>
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">World</a>
                  </li>
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Games</a>
                  </li>
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">References</a>
                  </li>
                </ul>
              </div>
              <div>
                <p class="font-semibold tracking-wide text-teal-accent-400">Cherry</p>
                <ul class="mt-2 space-y-2">
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Web</a>
                  </li>
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">eCommerce</a>
                  </li>
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Business</a>
                  </li>
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Entertainment</a>
                  </li>
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Portfolio</a>
                  </li>
                </ul>
              </div>
              <div>
                <p class="font-semibold tracking-wide text-teal-accent-400">Apples</p>
                <ul class="mt-2 space-y-2">
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Media</a>
                  </li>
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Brochure</a>
                  </li>
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Nonprofit</a>
                  </li>
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Educational</a>
                  </li>
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Projects</a>
                  </li>
                </ul>
              </div>
              <div>
                <p class="font-semibold tracking-wide text-teal-accent-400">
                  Business
                </p>
                <ul class="mt-2 space-y-2">
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Infopreneur</a>
                  </li>
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Personal</a>
                  </li>
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Wiki</a>
                  </li>
                  <li>
                    <a href="/" class="transition-colors duration-300 text-deep-purple-50 hover:text-teal-accent-400">Forum</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="flex flex-col justify-between pt-5 pb-10 border-t border-deep-purple-accent-200 sm:flex-row">
            <p class="text-sm text-gray-100">
              © Copyright 2020 Lorem Inc. All rights reserved.
            </p>
            <div class="flex items-center mt-4 space-x-4 sm:mt-0">
              <a href="/" class="transition-colors duration-300 text-deep-purple-100 hover:text-teal-accent-400">
                <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                  <path
                    d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z"
                  ></path>
                </svg>
              </a>
              <a href="/" class="transition-colors duration-300 text-deep-purple-100 hover:text-teal-accent-400">
                <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
                  <circle cx="15" cy="15" r="4"></circle>
                  <path
                    d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z"
                  ></path>
                </svg>
              </a>
              <a href="/" class="transition-colors duration-300 text-deep-purple-100 hover:text-teal-accent-400">
                <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                  <path
                    d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z"
                  ></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>

    {{-- La directiva script está en app.blade.php esto permite que al cargar la pagína principal de la plantilla se
    ejecute el js en ese momento --}}
    @push('script')

        <script src="/assets/js/javascript.js"></script>

    @endpush

</x-app-layout>