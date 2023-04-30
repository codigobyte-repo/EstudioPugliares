<div class="bg-gradient-to-b from-slate-100 via-gray-700 to-white mb-36" id="noticias">

    <div class="text-center">
                
        <h1 class="text-3xl md:text-6xl font-bold text-gray-600">Últimas <span class="bg-gradient-to-r from-slate-500 to-slate-800 p-2 text-white">NOTICIAS</span></h1>

        {{-- Efecto CSS public -> asset -> css -> efectos.css--}}
        <div class="circle-container mt-4">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>

        <p class="mt-2 text-lg md:text-2xl text-gray-600">"¡Te mantenemos informados con las últimas novedades contables!"</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mx-4 md:mx-24 py-24">

        
            @foreach($posts as $post)
                <article class="w-full h-80 bg-cover bg-center relative rounded-tl-lg rounded-br-lg"
                    style="background-image: url({{ isset($post->image) ? Storage::disk('public_images')->url($post->image->url) : asset('images/background-default.png') }})">
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <div>
                            @foreach ($post->tags as $tag)                            
                                <a href="{{ route('posts.show', $post) }}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{ $tag->name }}</a>
                            @endforeach
                        </div>

                        <h1 class="text-4xl text-white leading-8 font-bold">
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

    <div class="text-center">
        <span class="text-2xl text-gray-300 font-bold"> >>> </span> 
        <a href="{{ url('blog') }}" class="relative px-10 py-4 font-bold text-black group">
            <span class="absolute inset-0 w-full h-full transition duration-300 ease-out transform -translate-x-2 -translate-y-2 bg-gradient-to-r from-slate-500 to-slate-800 group-hover:translate-x-0 group-hover:translate-y-0"></span>
            <span class="absolute inset-0 w-full h-full border-4 border-gray-800"></span>
            <span class="relative text-yellow-500">IR AL BLOG</span>
        </a>
        <span class="text-2xl text-gray-300 font-bold"> <<< </span>
        
    </div>

</div>


