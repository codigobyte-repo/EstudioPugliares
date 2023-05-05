<div>
            
    <div class="flex p-4 mb-4 text-lg text-green-600 rounded-lg bg-gray-800 items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
        </svg>              
        <span class="sr-only">Info</span>
        <div>
        <span class="font-medium ml-2">¡Muchas gracias!</span> Recibimos el pago por {{ $order->titulo }} correctamente.
        </div>
    </div>
    
    <div class="text-center mt-8">
        <h1 class="text-2xl">Sólo queda un paso más</h1>
        <p class="text-lg">Para adquirir su pedido complete sus datos y lo estaremos contactando.</p>

        <div class="max-w-2xl mx-auto mt-20 bg-gray-200 px-6 py-8 rounded-lg shadow-2xl">
            <div>
                <fieldset class="border border-solid rounded-lg border-gray-300 p-3 my-4">
                    <legend class="text-sm font-semibold">Datos personales</legend>

                        <div class="flex justify-center items-center my-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>

                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre y apellido</label>
                            <input wire:model="name" required type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ingrese su nombre" required>
                        </div>
                        @error('name') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror
                        
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Correo electrónico</label>
                            <input wire:model="email" required type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ingrese su correo electrónico" required>
                        </div> 
                        @error('email') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror
                </fieldset>

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

                <fieldset class="border border-solid rounded-lg border-gray-300 p-3 my-4">
                    <legend class="text-sm font-semibold">Contraseña</legend>

                        <div class="flex justify-center items-center my-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                            </svg>                                  
                        </div>

                        <div class="mb-6">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
                            <input wire:model="password" type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="•••••••••" required>
                        </div>
                        @error('password') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror
                        
                        <div class="mb-6">
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirmar contraseña</label>
                            <input wire:model="password_confirmation" type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="•••••••••" required>
                        </div>
                        @error('password_confirmation') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror
                        
                </fieldset>

                <button wire:click="save" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrarse</button>
            </div>
        </div>

    </div>
</div>
