<div>
    

    <div class="max-w-3xl col-span-2">
        <div class="w-full">
            
            <div class="mb-2">
                <input wire:model='nombre' class="w-full mb-4 px-3 py-4 border rounded-lg" type="text" placeholder="Nombre">
                @error('nombre') <span class="text-red-600 text-xs font-semibold"> {{ $message }} </span> @enderror
            </div>

            <div class="mb-2">
                <input wire:model='apellido' class="w-full mb-4 px-3 py-4 border rounded-lg" type="text" placeholder="Apellido">
                @error('apellido') <span class="text-red-600 text-xs font-semibold"> {{ $message }} </span> @enderror
            </div>

            <div class="mb-2">
                <input wire:model='email' class="w-full mb-4 px-3 py-4 border rounded-lg" type="email" placeholder="Correo electrónico">
                @error('email') <span class="text-red-600 text-xs font-semibold"> {{ $message }} </span> @enderror
            </div>
            
            <div class="mb-2">
                <input wire:model='whatsapp' class="w-full mb-4 px-3 py-4 border rounded-lg" type="text" inputmode="numeric" pattern="[0-9]*" placeholder="Whatsapp">
                @error('whatsapp') <span class="text-red-600 text-xs font-semibold"> {{ $message }} </span> @enderror
            </div>
            
            <div class="mb-2">
                <textarea wire:model='mensaje' class="w-full mb-4 px-3 py-4 border rounded-lg" placeholder="Mensaje"></textarea>
                @error('mensaje') <span class="text-red-600 text-xs font-semibold"> {{ $message }} </span> @enderror
            </div>

            <div class="mt-6">
                <label for="captcha">Resuelve la siguiente operación:</label>
                <div class="flex flex-row my-4">
                    <div class="mr-2">
                        {{ $num1 }} + {{ $num2 }} =
                        <input type="text" id="captcha" name="captcha" placeholder="Resultado" wire:model="captcha">
                        <br/>
                    </div>
                    <button class="py-2 px-2 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-white dark:text-gray-900 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" 
                    type="button" wire:click="generateCaptcha">Generar nuevo captcha</button>
                </div>
                @error('captcha') <span class="text-red-600 text-xs font-semibold">{{ $message }}</span> @enderror
                
                <div class="text-center">
                    
                    <button type="button" wire:click="submit" class="block w-full bg-purple-500 text-white text-lg font-light py-4 px-4 rounded focus:outline-none focus:shadow-outline">
                        Solicitar Asesoramiento
                    </button>
                    
                    @if($valor)
                        <div class="flex p-4 mb-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div>
                            <span class="font-medium">{{ $valor }}
                            </div>
                        </div>
                    @endif

                    <div>
                        @if (session()->has('message'))
                            <div class="flex p-4 mb-4 mt-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">{{ session('message') }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
