<x-app-layout>

    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-40">

       <h1 class="uppercase text-center text-3xl font-bold"> Temas: {{ $tag->name }} </h1>

       @foreach ($posts as $post)
            {{-- LLamamos al componente creado en view->components card-post.blade.php y le pasamos la variable post --}}
           <x-card-post :post="$post" />
       @endforeach

       <div class="mt-4">
            {{ $posts->links() }}
       </div>

    </div>

</x-app-layout>