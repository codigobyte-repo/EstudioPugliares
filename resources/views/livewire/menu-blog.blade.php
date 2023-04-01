<nav class="bg-gray-800 pt-28" x-data="{ open:false }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button x-on:click="open = !open" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    
                    <!--Icon when menu is closed.-->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    
                    <!--Icon when menu is open.-->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <p x-on:click="open = !open" class="text-base text-gray-500 cursor-pointer">Categorías</p>
            </div>
            {{-- Menu Screen Lg --}}
            <div class="flex flex-1 items-center justify-center sm:items-stretch">
                <div class="hidden sm:ml-6 sm:block">
                <div class="flex space-x-4">
                    @foreach ($categories as $category)
                        <a href="{{ route('posts.category', $category) }}" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">{{ $category->name }}</a>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show="open" x-on:click.away="open = false">
        <div class="space-y-1 px-2 pb-3 pt-2">
            @foreach ($categories as $category)
                <a href="{{ route('posts.category', $category) }}" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
</nav>