<nav class="bg-white pt-2" x-data="{ open:false }">
  <div class="mx-auto w-full px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
              <!-- Mobile menu button-->
              <button x-on:click="open = !open" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                  <span class="sr-only">Abrir opciones de menú</span>

                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="block w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>

              </button>
              <p x-on:click="open = !open" class="text-base text-gray-500 cursor-pointer hover:text-gray-800 hover:font-semibold">Cotizaciones</p>
          </div>
          {{-- Menu Screen Lg --}}
          <div class="flex flex-1 items-center justify-center sm:items-stretch">
              <div class="hidden sm:ml-6 sm:block">
                <div class="flex space-x-4">

                    
                        <div class="flex flex-row items-center justify-between bg-white p-4 border-r-4 border-gray-200">
                          <h2 class="font-bold text-xs mr-2 text-gray-600">Dólar oficial</h2>
                          <p class="text-xs mr-2"> Venta: <span class="text-blue-700 font-bold">${{ $data['oficial']['value_sell'] }}</span></p>
                          <p class="text-xs"> Compra: <span class="text-blue-700 font-bold">${{ $data['oficial']['value_buy'] }}</span></p>
                        </div>
                      
                        <div class="flex flex-row items-center justify-between bg-white p-4 border-r-4 border-gray-200">
                          <h2 class="font-bold text-xs mr-2 text-gray-600">Dólar blue</h2>
                          <p class="text-xs mr-2"> Venta: <span class="text-blue-700 font-bold">${{ $data['blue']['value_sell'] }}</span></p>
                          <p class="text-xs"> Compra: <span class="text-blue-700 font-bold">${{ $data['blue']['value_buy'] }}</span></p>
                        </div>
                      
                        <div class="flex flex-row items-center justify-between bg-white p-4 border-r-4 border-gray-200">
                          <h2 class="font-bold text-xs mr-2 text-gray-600">Euro oficial</h2>
                          <p class="text-xs mr-2"> Venta: <span class="text-blue-700 font-bold">${{ $data['oficial_euro']['value_sell'] }}</span></p>
                          <p class="text-xs"> Compra: <span class="text-blue-700 font-bold">${{ $data['oficial_euro']['value_buy'] }}</span></p>
                        </div>
                      
                        <div class="flex flex-row items-center justify-between bg-white p-4 border-r-4 border-gray-200">
                          <h2 class="font-bold text-xs mr-2 text-gray-600">Euro blue</h2>
                          <p class="text-xs mr-2"> Venta: <span class="text-blue-700 font-bold">${{ $data['blue_euro']['value_sell'] }}</span></p>
                          <p class="text-xs"> Compra: <span class="text-blue-700 font-bold">${{ $data['blue_euro']['value_buy'] }}</span></p>
                        </div>                   

                </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu" x-show="open" x-on:click.away="open = false">
      <div class="space-y-1 px-2 pb-3 pt-2">

          <div class="flex flex-col md:flex-row justify-center items-center space-y-4 md:space-y-0 md:space-x-4">
            <div class="flex flex-row items-center justify-between bg-white p-4 border border-r-4 border-gray-200">
              <h2 class="font-bold text-xs mr-2 text-gray-600">Dólar oficial</h2>
              <p class="text-xs mr-2"> Venta: <span class="text-blue-700 font-bold">${{ $data['oficial']['value_sell'] }}</span></p>
              <p class="text-xs"> Compra: <span class="text-blue-700 font-bold">${{ $data['oficial']['value_buy'] }}</span></p>
            </div>
          
            <div class="flex flex-row items-center justify-between bg-white p-4 border border-r-4 border-gray-200">
              <h2 class="font-bold text-xs mr-2 text-gray-600">Dólar blue</h2>
              <p class="text-xs mr-2"> Venta: <span class="text-blue-700 font-bold">${{ $data['blue']['value_sell'] }}</span></p>
              <p class="text-xs"> Compra: <span class="text-blue-700 font-bold">${{ $data['blue']['value_buy'] }}</span></p>
            </div>
          
            <div class="flex flex-row items-center justify-between bg-white p-4 border border-r-4 border-gray-200">
              <h2 class="font-bold text-xs mr-2 text-gray-600">Euro oficial</h2>
              <p class="text-xs mr-2"> Venta: <span class="text-blue-700 font-bold">${{ $data['oficial_euro']['value_sell'] }}</span></p>
              <p class="text-xs"> Compra: <span class="text-blue-700 font-bold">${{ $data['oficial_euro']['value_buy'] }}</span></p>
            </div>
          
            <div class="flex flex-row items-center justify-between bg-white p-4 border border-r-4 border-gray-200">
              <h2 class="font-bold text-xs mr-2 text-gray-600">Euro blue</h2>
              <p class="text-xs mr-2"> Venta: <span class="text-blue-700 font-bold">${{ $data['blue_euro']['value_sell'] }}</span></p>
              <p class="text-xs"> Compra: <span class="text-blue-700 font-bold">${{ $data['blue_euro']['value_buy'] }}</span></p>
            </div>  
          </div>

      </div>
  </div>
</nav>
