<div>
    <div class="mt-12 mx-auto text-center bg-gray-200 px-4 py-8 rounded-lg shadow-lg">

        <h2 class="text-lg lg:text-2xl font-bold text-gray-600 mb-4 flex flex-wrap items-center justify-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
            </svg>              
            Suscríbete a nuestro blog
        </h2>

        <p class="text-gray-500 mb-8">Recibe las últimas novedades contables directamente en tu bandeja de entrada.</p>

        @if (session()->has('success'))
            <div class="bg-green-200 text-green-800 py-2 px-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="max-w-2xl mx-auto">
            <form wire:submit.prevent="subscribe">

                <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                    <div class="w-full px-2 md:w-1/2">
                        <label class="block text-gray-700 font-bold mb-2" for="name">
                            Nombre
                        </label>
                        <input wire:model="name" class="form-input w-full text-sm rounded-2xl" type="text" id="name" name="name" autocomplete="off">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                
                    <div class="w-full px-2 md:w-1/2">
                        <label class="block text-gray-700 font-bold mb-2" for="email">
                            Correo electrónico
                        </label>
                        <input wire:model="email" class="form-input w-full text-sm rounded-2xl" type="email" id="email" name="email" autocomplete="off">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            
                <button type="submit" class="text-xs bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 my-4 rounded-3xl">
                    Suscribirse
                </button>
            </form>
        </div>

    </div>
</div>
