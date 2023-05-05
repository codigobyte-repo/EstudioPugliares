<x-app-layout>

    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-40">

        @if(isset($perfil))
            <h1 class="flex flex-1 items-center ml-8 text-2xl text-gray-600 font-semibold py-2">MIS COMPRAS
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                </svg>
            </h1> 
            <ul>
                @foreach ($orders as $order)
                    <li class="w-full rounded-lg overflow-hidden shadow-lg bg-white flex flex-col justify-between mx-6 my-2">
                        <div class="relative px-6 py-4 h-full">
                            <article class="text-center">
                                <h1 class="text-xl text-center mx-4 my-8 font-bold bg-gradient-to-r from-violet-600 to-fuchsia-700 bg-clip-text text-transparent mb-4 uppercase">
                                    {{ $order->titulo }}
                                </h1>
                                
                                <span class="text-base font-semibold">
                                    Adquirido: {{ $order->created_at->diffForHumans() }}
                                </span>

                                <span class="flex flex-col items-center py-1 text-2xl">


                                    <span class="text-gray-600 my-4 px-4 text-4xl rounded-br-lg font-semibold">
                                        PRECIO ${{ number_format($order->precio, 0, ',', '.') }}
                                    </span>

                                </span>
                            </article>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="w-full rounded-lg overflow-hidden flex flex-col justify-between mx-6 my-2">
                <div id="alert-border-2" class="flex p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div class="ml-3 text-sm font-medium">
                    Para completar la compra es necesario que nos indique los datos de contacto
                    </div>
                </div>
            </div>

            <div class="flex flex-1 items-center justify-center ml-8 text-2xl text-gray-600 font-semibold py-2">
                @livewire('completar-perfil')
            </div>
        @endif
    </div>
    
</x-app-layout>