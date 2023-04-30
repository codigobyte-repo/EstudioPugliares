<x-app-layout>

    {{-- title y description son parametros que le pasamos a la plantilla principal para que muestre el titulo del post y la descripcion para mejorar el seo --}}
    <x-slot name="title">
        {{ $post->name }}
    </x-slot>

    <x-slot name="description">
        {{ $post->extract }}
    </x-slot>
    {{-- Fin de los parametros --}}

    <div class="container py-10 px-4 pt-32 md:pt-48">

        <div class="mb-4">
            @foreach ($post->tags as $tag)
            <a href="{{ route('posts.tag', $tag) }}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{
                $tag->name }}</a>
            @endforeach
        </div>

        <h1 class="text-4xl font-bold text-gray-700 my-10">{{ $post->name }}</h1>

        <div class="text-lg text-gray-500 md:mb-2 mx-auto">
            <h2>{!! $post->extract !!}</h2>
        </div>

        <div class="flex items-center mb-4 w-full my-8">
            <div>
                <p class="border-t border-b border-gray-200 py-2 inline-flex items-center text-sm text-gray-500 font-semibold">
                    Escrito por:
                    <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" class="rounded-full h-10 w-10 mx-2 object-cover">
                    <span class="border-r-2 border-gray-200 pr-2 mr-2 font-semibold">{{ $post->user->name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-2">{{ $post->created_at->diffForHumans() }}</span>
                </p>
                        
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- contenido principal --}}
            <div class="lg:col-span-2">
                <figure>
                    <img class="w-full h-80 object-cover object-center rounded-lg shadow-xl dark:shadow-gray-600" src="{{ isset($post->image) ? Storage::disk('public_images')->url($post->image->url) : asset('images/background-default.png') }}" alt="{{ $post->name }}">
                </figure>

                <div class="text-base leading-7 text-gray-500 mt-8 whitespace-normal prose lg:prose-xl">
                    {!! $post->body !!}
                </div>

            </div>

            {{-- contenido relacionado --}}
            <aside>
                <h1 class="text-sm font-bold text-gray-600 mb-4">ÚLTIMAS NOTAS RELACIONADAS CON: {{ strtoupper($post->category->name) }}</h1>

                <ul>
                    <?php $counter=1;?>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex border-b border-gray-200 my-8 pb-2" href="{{ route('posts.show', $similar) }}">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                  
                                <span class="text-sm ml-2 text-gray-600"> <?php echo $counter;?> . {{ Str::limit($similar->name, 50, '...') }}</span>
                            </a>
                        </li>
                        <?php $counter++;?>
                    @endforeach
                </ul>
            </aside>

        </div>

        {{-- Sistema de subscripcion --}}
        @livewire('subscribe-form')
        {{-- Fin Sistema de subscripcion --}}
        

        {{-- Sistema de comentarios --}}
        @livewire('comments', ['post_id' => $post->id])
        {{-- Fin Sistema de comentarios --}}

    </div>

    <!--Footer container-->
    <aside class="bg-gradient-to-b from-gray-100 to-white text-center lg:text-left">
        <div class="container p-6 text-gray-600">
            
            <div class="flex justify-center items-center mb-6">
                
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>                  
                  
                <h2 class="text-lg lg:text-2xl font-bold text-gray-600 ml-2">Últimas notas relacionadas con: {{ $post->category->name }}</h2>
            </div>

            <div class="grid gap-4 lg:grid-cols-2">

                @foreach ($similares as $similar)
                <a href="{{ route('posts.show', $similar) }}">
                    <div class="mb-6 md:mb-0">

                        <div class="flex justify-center items-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                              
                            <h5 class="text-base font-medium">{{ Str::limit($similar->name, 50, '...') }}</h5>
                        </div>

                        @if($similar->image)
                            <img class="w-80 h-45 object-cover object-center rounded-lg mx-auto" src="{{ Storage::disk('public_images')->url($similar->image->url) }}" alt="{{ $similar->name }}">
                        @else
                            <img class="w-80 h-45 object-cover object-center rounded-lg mx-auto" src="{{ asset('images/background-default.png') }}" alt="{{ $similar->name }}">
                        @endif
                    </div>
                </a>
                @endforeach
            </div>
        </div>

    </aside>

    <!-- Pie de Página -->
    @livewire('footer')
    <!-- Fin Pie de Página -->

</x-app-layout>