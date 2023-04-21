<div>
    <section class="bg-gray-100 py-8 lg:py-16 mt-10 rounded-lg shadow-lg">

        <div class="w-full mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Comentarios ({{ $countComments }})</h2>
            </div>
          
            {{-- caja principal --}}
            <div class="mb-6">
                <div class="py-2 px-4 mb-4 bg-gray-800  rounded-lg rounded-t-lg border border-gray-200 shadow-lg">
                    
                    <label for="message" class="sr-only">Tú comentario</label>
                    
                    <textarea wire:model.lazy="message" id="message" rows="6"
                        class="bg-gray-800 px-0 w-full text-sm text-white border-0 focus:ring-0 focus:outline-none dark:placeholder-gray-400"
                        placeholder="Escribe un comentario..." required>
                    </textarea>
                    @error('message') <span class="text-red-600 text-xs font-semibold"> {{ $message }} </span> @enderror
                </div>
                
                @auth
                    <button wire:click="addComment"
                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-black rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Comentar
                    </button>
                @else
                    <div class="flex items-center">
                        <a href="{{ route('login') }}" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-gray-400 rounded-lg hover:bg-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>                          
                            <span class="ml-2">Iniciar sesión para comentar</span>
                        </a>
                        <span class="ml-2 text-xs">¿No estás registrado? <a class="text-blue-600 cursor-pointer font-semibold" href="{{ route('register') }}">Registrarse</a></span>
                    </div>
                @endauth
            </div>

            {{-- comentarios --}}
            @foreach($comments as $comment)
                <div class="border-b border-gray-300 pb-4 mb-4 text-base">
                    <div class="bg-gray-800 rounded-lg px-4 py-4 my-2 text-white">
                        <div class="flex items-center">
                            <img class="mr-2 w-6 h-6 rounded-full" src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->profile_photo_url }}">
                            <div class="font-semibold mr-2 text-sm">{{ $comment->user->name }}</div>
                            <div class="text-gray-500 text-xs">{{ $comment->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="text-gray-400 my-4">{{ $comment->message }}</div>
                    </div>

                    @if($comment->replies->count())
                        <div class="ml-8">
                            @foreach($comment->replies as $reply)
                                <div class="bg-gray-700 rounded-lg px-4 py-4 my-2 border-l border-gray-300 pl-4 mb-4 text-white">
                                    <div class="flex items-center">
                                        <img class="mr-2 w-6 h-6 rounded-full" src="{{ $reply->user->profile_photo_url }}" alt="{{ $comment->user->profile_photo_url }}">
                                        <div class="font-semibold mr-2 text-sm">{{ $reply->user->name }}</div>
                                        <div class="text-gray-500 text-xs">{{ $reply->created_at->diffForHumans() }}</div>
                                    </div>
                                    <div class="text-gray-400 my-4">{{ $reply->message }}</div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if($replyingToCommentId == $comment->id)
                        <div class="ml-8 mt-4">
                            <form wire:submit.prevent="addComment">
                                <div>
                                    <label for="reply-message" class="block text-sm font-medium text-gray-700">Respuesta</label>
                                    <div class="mt-1">
                                        <textarea id="reply-message" name="message" wire:model="message" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                    </div>
                                    @error('message') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>
                                <div class="mt-3">
                                    <button wire:click="addComment" type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Agregar respuesta
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                    
                    @can('posts.comment')    
                        <div class="flex items-center">
                            <button wire:click="$set('replyingToCommentId', {{ $comment->id }})" class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                                <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                Responder
                            </button>
                        </div>
                    @endcan

                </div>
            @endforeach
            {{-- comentarios --}}
          
        </div>
    </section>
</div>
