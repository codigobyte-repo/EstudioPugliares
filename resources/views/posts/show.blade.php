<x-app-layout>

    {{-- title y description son parametros que le pasamos a la plantilla principal para que muestre el titulo del post y la descripcion para mejorar el seo --}}
    <x-slot name="title">
        {{ $post->name }}
    </x-slot>

    <x-slot name="description">
        {{ $post->extract }}
    </x-slot>
    {{-- Fin de los parametros --}}

    <div class="container py-40 px-4">
        <h1 class="text-4xl font-bold text-gray-700">{{ $post->name }}</h1>

        <div class="text-lg text-gray-500 md:mb-2 mx-auto">
            <h2>{{ $post->extract }}</h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- contenido principal --}}
            <div class="lg:col-span-2">
                <figure>
                    <img class="w-full h-80 object-cover object-center" src="{{ Storage::disk('public_images')->url($post->image->url) }}" alt="{{ $post->name }}">
                </figure>

                <div class="text-base leading-7 text-gray-500 mt-4 whitespace-normal">
                    {{ $post->body }}
                </div>

            </div>

            {{-- contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{ $post->category->name }}</h1>

                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.show', $similar) }}">
                                <img class="w-40 h-25 object-cover object-center rounded-lg" src="{{ Storage::disk('public_images')->url($similar->image->url) }}" alt="{{ $similar->name }}">
                                <span class="ml-2 text-gray-600">{{ $similar->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>

    </div>

</x-app-layout>