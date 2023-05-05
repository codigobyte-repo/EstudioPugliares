<div>
    <h1 class="text-2xl">Sólo queda un paso más</h1>
    <p class="text-lg">Para adquirir su pedido complete sus datos y lo estaremos contactando.</p>

    <div class="w-full mx-auto mt-2 px-6 py-2 rounded-lg shadow-2xl">
        <div>
            <fieldset class="border border-solid rounded-lg border-gray-300 p-3 my-4">
                <legend class="text-sm font-semibold">Datos de su compañía</legend>

                    <div class="flex justify-center items-center my-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                        </svg>                                  
                    </div>

                    <div class="mb-6">
                        <label for="compania" class="block mb-2 text-sm font-medium text-gray-900">Nombre de su compañía</label>
                        <input wire:model="compania" type="text" id="compania" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ingrese nombre sú compañía" required>
                    </div>
                    @error('compania') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror

                    <div class="mb-6">
                        <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900">Teléfono de contacto</label>
                        <input wire:model="telefono" type="text" id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ingrese su número teléfonico" required>
                    </div>
                    @error('telefono') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror
            </fieldset>

            <button wire:click="save" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
        </div>
    </div>
</div>
