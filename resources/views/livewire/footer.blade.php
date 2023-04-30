<div>
    <div class="relative mt-16 bg-gradient-to-b from-black to-gray-800">
        
        <svg class="absolute top-0 w-full h-6 -mt-5 sm:-mt-10 sm:h-16 text-deep-purple-accent-400" preserveAspectRatio="none" viewBox="0 0 1440 54">
          <path fill="currentColor" d="M0 22L120 16.7C240 11 480 1.00001 720 0.700012C960 1.00001 1200 11 1320 16.7L1440 22V54H1320C1200 54 960 54 720 54C480 54 240 54 120 54H0V22Z"></path>
        </svg>

        <div class="px-4 pt-12 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
          <div class="grid gap-16 row-gap-10 mb-8 lg:grid-cols-6">
            <div class="md:max-w-md lg:col-span-2 text-center">
              <a href="{{ url('/') }}" aria-label="Go home" title="Company" class="inline-flex items-center">
                    <x-jet-application-mark class="block h-2 w-auto" />
              </a>
              <div class="mt-4 lg:max-w-sm">
                <p class="text-sm text-white">
                    Somos un equipo conformado por profesionales donde la excelencia y el compromiso son nuestros valores fundamentales, con una trayectoria de más de 40 años en el mercado.
                </p>
              </div>
            </div>
            <div class="grid grid-cols-2 gap-5 row-gap-8 lg:col-span-3 md:grid-cols-3">
              <div class="hidden md:block">
                <p class="font-semibold tracking-wide text-gray-400">
                  Categorías
                </p>
                <ul class="mt-2 space-y-2">
                  @foreach ($categories as $category)
                    <li>
                      <a href="/" class="transition-colors duration-300 text-white hover:text-gray-400">{{ $category->name }}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
              <div class="hidden md:block">
                <p class="font-semibold tracking-wide text-gray-400">Etiquetas</p>
                <ul class="mt-2 space-y-2">
                  @foreach ($tags as $tag)
                    <li>
                      <a href="/" class="transition-colors duration-300 text-white hover:text-gray-400">{{ $tag->name }}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
              <div class="hidden md:block">
                <p class="font-semibold tracking-wide text-gray-400">Últimas noticias</p>
                <ul class="mt-2 space-y-2">
                  @foreach ($posts as $post)
                    <li>
                      <a href="/" class="transition-colors duration-300 text-white hover:text-gray-400">{{ Str::limit($post->name, $limit = 15, $end = '...') }}
                      </a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 gap-5 row-gap-8 lg:col-span-3 md:grid-cols-3 my-4 pl-8 md:pl-0">
              
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
              <img class="mx-auto my-4 w-8 h-8 mt-6" src="{{asset('images/icons/navigation.png')}}" alt="Dirección">
              <div class="px-6 py-4">
                <div class="text-center font-bold text-xl mb-2">Dirección</div>
                <p class="text-gray-700 text-base text-center font-semibold">
                  Talcahuano 386, Banfield
                </p>
              </div>
            </div>

            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
              <img class="mx-auto my-4 w-8 h-8 mt-6" src="{{asset('images/icons/correo-electronico.png')}}" alt="Correo elctrónico">
              <div class="px-6 py-4 text-center">
                <div class="text-center font-bold text-xl mb-2">Correo electrónico</div>
                <p class="text-gray-700 text-base text-center font-semibold" id="email">
                  administracion@estudiopugliares.com.ar
                </p>
                <button class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 rounded mt-4" onclick="copyToClipboard()">Copiar dirección de correo electrónico</button>
              </div>
            </div>

            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
              <img class="mx-auto my-4 w-8 h-8 mt-6" src="{{asset('images/icons/telefono.png')}}" alt="Teléfono">
              <div class="px-6 py-4">
                <div class="text-center font-bold text-xl mb-2">Teléfonos</div>
                <p class="text-gray-700 text-base text-center font-semibold">
                  +54 4202-9255 / +54 4248-9290
                </p>
              </div>
            </div>
          </div>

          <div class="flex flex-col justify-between pt-5 pb-10 border-t border-white sm:flex-row">

            <p class="text-sm text-gray-100">
              © Copyright <?php echo date('Y') ?>. Derechos reservados || Desarrollado por <a class="font-bold hover:text-blue-600" target="to_blank" href="https//www.codigobyte.com.ar/">Código Byte</a>
            </p>
            <div class="flex items-center mt-4 space-x-4 sm:mt-0">
              <a href="/" class="transition-colors duration-300 text-white hover:text-gray-400">
                <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                  <path
                    d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z"
                  ></path>
                </svg>
              </a>
              <a href="/" class="transition-colors duration-300 text-white hover:text-gray-400">
                <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
                  <circle cx="15" cy="15" r="4"></circle>
                  <path
                    d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z"
                  ></path>
                </svg>
              </a>
              <a href="/" class="transition-colors duration-300 text-white hover:text-gray-400">
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
</div>
