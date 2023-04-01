<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#f3f4f5" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
</svg>
<div class="bg-gradient-to-b from-slate-100 via-violet-600 to-slate-50">

    <div class="text-center">
                
        <h1 class="sm:text-3xl md:text-6xl font-bold color-texto">Últimas <span class="bg-gradient-to-br from-purple-400 to-pink-600 p-2 text-white">NOTICIAS</span></h1>

        {{-- Efecto CSS public -> asset -> css -> efectos.css--}}
        <div class="circle-container mt-4">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>

        <p class="mt-2 text-lg text-gray-600">"¡Te mantenemos informados con las últimas novedades contables!"</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mx-24 py-24">

        
            @foreach($posts as $post)
                <article class="w-full h-80 bg-cover bg-center relative rounded-tl-lg rounded-br-lg"
                    style="background-image: url({{ Storage::disk('public_images')->url($post->image->url) }})">
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <div>
                            @foreach ($post->tags as $tag)                            
                                <a href="" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{ $tag->name }}</a>
                            @endforeach
                        </div>

                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="">
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

    <div class="text-center py-8">
        <span class="text-2xl text-gray-300 font-bold"> >>> </span> 
        <a href="{{ url('blog') }}" class="px-5 py-4 text-2xl font-medium text-center text-white transition duration-500 ease-in-out transform bg-gradient-to-br from-purple-400 to-pink-600 lg:px-10 rounded-full">Ir al blog</a> 
        <span class="text-2xl text-gray-300 font-bold"> <<< </span>
    </div>
</div>


