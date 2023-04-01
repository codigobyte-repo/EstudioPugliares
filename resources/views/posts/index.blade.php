<x-app-layout>


    @livewire('menu-blog')


    <div class="container mx-auto py-28">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($posts as $post)
            <article class="w-full h-80 bg-cover bg-center relative @if($loop->first) md:col-span-2 @endif shadow-lg rounded-lg overflow-hidden"
                style="background-image: url({{ Storage::disk('public_images')->url($post->image->url) }})">
                
                <div class="w-full h-full px-8 flex flex-col justify-center">

                    <div>
                        @foreach ($post->tags as $tag)
                        <a href="{{ route('posts.tag', $tag) }}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{
                            $tag->name }}</a>
                        @endforeach
                    </div>

                    <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                        <a href="{{ route('posts.show', $post) }}">
                            {{ $post->name }}
                        </a>
                    </h1>
                </div>
                <div class="sr-only">
                    <span class="post-image-alt">{{ $post->name }}</span>
                </div>
            </article>
            @endforeach

        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>

    </div>
</x-app-layout>