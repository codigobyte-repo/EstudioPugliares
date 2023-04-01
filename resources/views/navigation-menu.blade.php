{{-- Generamos el linkeo a través de un array para las distintas resoluciones --}}

@php

    $nav_links = [

        [
            'name' => 'Inicio',
            'route' => url('/'),
            'active' => request()->routeIs('/')
        ],

        [
            'name' => 'Servicios',
            'route' => route('servicios'),
            'active' => request()->routeIs('servicios')
        ],

        [
            'name' => 'Equipo',
            'route' => route('equipo'),
            'active' => request()->routeIs('equipo')
        ],

        [
            'name' => 'Blog',
            'route' => route('blog'),
            'active' => request()->routeIs('blog')
        ],

        [
            'name' => 'Contacto',
            'route' => route('contacto'),
            'active' => request()->routeIs('contacto')
        ]
    ];

@endphp

<nav x-data="{ open: false }" class="fixed w-full bg-gradient-to-r from-black to-gray-800 z-50 cursor-pointer">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-2">
      
        <!-- Logo -->
        <div class="absolute shrink-0 flex ml-0 mt-2" data-aos="fade-down-right">
            <a href="{{ url('/') }}">
                <x-jet-application-mark class="block h-9 w-auto" />
            </a>
        </div>

        <div class="relative flex items-center justify-between h-28">

            
            <div class="flex mx-auto xl:pl-28">

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 xl:flex">
                    
                    {{-- Utilizamos la siguiente condiciona para poder redirigirnos en el blog ya que es una pagina externa --}}
                    @if (request()->route()->getName() == 'blog')
                        <x-jet-nav-link href="{{ url('/') }}">
                            Inicio
                        </x-jet-nav-link>
                        
                        <x-jet-nav-link href="{{ url('/') }}#servicios">
                            Servicios
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ url('/') }}#somos">
                            Quiénes Somos
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ url('blog') }}" :active="request()->routeIs('blog')">
                            Blog
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ url('/') }}#contacto">
                            Contacto
                        </x-jet-nav-link>

                    @else
                        <x-jet-nav-link href="{{ url('/') }}">
                            Inicio
                        </x-jet-nav-link>

                        <x-jet-nav-link href="javascript:void(0);" onclick="scrollToSection('servicios')">
                            Servicios
                        </x-jet-nav-link>

                        <x-jet-nav-link href="javascript:void(0);" onclick="scrollToSection('somos')">
                            Quiénes Somos
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ url('blog') }}">
                            Blog
                        </x-jet-nav-link>

                        <x-jet-nav-link href="javascript:void(0);" onclick="scrollToSection('contacto')">
                            Contacto
                        </x-jet-nav-link>
                    @endif

                    

                    <!--Hoverable Link-->
                    <div class="hoverable hover:bg-gray-600 hover:text-white">
                        <x-jet-nav-link href="#" class="relative block py-6 lg:p-1 lg:mt-1 text-sm lg:text-1xl font-bold hover:bg-gray-800 hover:text-white">Hover</x-jet-nav-link>
                        <div class="p-6 mega-menu mb-16 sm:mb-0 shadow-xl bg-gray-800">
                        <div class="container mx-auto w-full flex flex-wrap justify-between">
                            <div class="w-full text-white mb-8">
                            <h2 class="font-bold text-2xl">Main Hero Message for the menu section</h2>
                            <p>Sub-hero message, not too long and not too short. Make it just right!</p>
                            </div>
                            <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-600 border-b sm:border-r lg:border-b-0 pb-6 pt-6 lg:pt-3">
                            <div class="flex items-center">
                                <svg class="h-8 mb-3 mr-3 fill-current text-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M3 6c0-1.1.9-2 2-2h8l4-4h2v16h-2l-4-4H5a2 2 0 0 1-2-2H1V6h2zm8 9v5H8l-1.67-5H5v-2h8v2h-2z"/>
                                </svg>
                                <h3 class="font-bold text-xl text-white text-bold mb-2">Heading 1</h3>
                            </div>
                            <p class="text-gray-100 text-sm">Quarterly sales are at an all-time low create spaces to explore the accountable talk and blind vampires.</p>
                            <div class="flex items-center py-3">
                                <svg class="h-6 pr-3 fill-current text-blue-300"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M20 10a10 10 0 1 1-20 0 10 10 0 0 1 20 0zm-2 0a8 8 0 1 0-16 0 8 8 0 0 0 16 0zm-8 2H5V8h5V5l5 5-5 5v-3z"/>
                                </svg>
                                <a href="#" class="text-white bold border-b-2 border-blue-300 hover:text-blue-300">Find out more...</a>
                            </div>
                            </ul>
                            <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-600 border-b sm:border-r-0 lg:border-r lg:border-b-0 pb-6 pt-6 lg:pt-3">
                            <div class="flex items-center">
                                <svg class="h-8 mb-3 mr-3 fill-current text-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M4.13 12H4a2 2 0 1 0 1.8 1.11L7.86 10a2.03 2.03 0 0 0 .65-.07l1.55 1.55a2 2 0 1 0 3.72-.37L15.87 8H16a2 2 0 1 0-1.8-1.11L12.14 10a2.03 2.03 0 0 0-.65.07L9.93 8.52a2 2 0 1 0-3.72.37L4.13 12zM0 4c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4z"/>
                                </svg>
                                <h3 class="font-bold text-xl text-white text-bold mb-2">Heading 2</h3>
                            </div>
                            <p class="text-gray-100 text-sm">Prioritize these line items game-plan draw a line in the sand come up with something buzzworthy UX upstream selling.</p>
                            <div class="flex items-center py-3">
                                <svg class="h-6 pr-3 fill-current text-blue-300"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M20 10a10 10 0 1 1-20 0 10 10 0 0 1 20 0zm-2 0a8 8 0 1 0-16 0 8 8 0 0 0 16 0zm-8 2H5V8h5V5l5 5-5 5v-3z"/>
                                </svg>
                                <a href="#" class="text-white bold border-b-2 border-blue-300 hover:text-blue-300">Find out more...</a>
                            </div>
                            </ul>
                            <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-600 border-b sm:border-b-0 sm:border-r md:border-b-0 pb-6 pt-6 lg:pt-3">
                            <div class="flex items-center">
                                <svg class="h-8 mb-3 mr-3 fill-current text-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M2 4v14h14v-6l2-2v10H0V2h10L8 4H2zm10.3-.3l4 4L8 16H4v-4l8.3-8.3zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"/>
                                </svg>
                                <h3 class="font-bold text-xl text-white text-bold mb-2">Heading 3</h3>
                            </div>
                            <p class="text-gray-100 text-sm">This proposal is a win-win situation which will cause a stellar paradigm shift, let's touch base off-line before we fire the new ux experience.</p>
                            <div class="flex items-center py-3">
                                <svg class="h-6 pr-3 fill-current text-blue-300"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M20 10a10 10 0 1 1-20 0 10 10 0 0 1 20 0zm-2 0a8 8 0 1 0-16 0 8 8 0 0 0 16 0zm-8 2H5V8h5V5l5 5-5 5v-3z"/>
                                </svg>
                                <a href="#" class="text-white bold border-b-2 border-blue-300 hover:text-blue-300">Find out more...</a>
                            </div>
                            </ul>
                            <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-600 pb-6 pt-6 lg:pt-3">
                            <div class="flex items-center">
                                <svg class="h-8 mb-3 mr-3 fill-current text-white"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z"/>
                                </svg>
                                <h3 class="font-bold text-xl text-white text-bold mb-2">Heading 4</h3>
                            </div>
                            <p class="text-gray-100 text-sm">This is a no-brainer to wash your face, or we need to future-proof this high performance keywords granularity.</p>
                            <div class="flex items-center py-3">
                                <svg class="h-6 pr-3 fill-current text-blue-300"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M20 10a10 10 0 1 1-20 0 10 10 0 0 1 20 0zm-2 0a8 8 0 1 0-16 0 8 8 0 0 0 16 0zm-8 2H5V8h5V5l5 5-5 5v-3z"/>
                                </svg>
                                <a href="#" class="text-white bold border-b-2 border-blue-300 hover:text-blue-300">Find out more...</a>
                            </div>
                            </ul>
                        </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="hidden xl:flex sm:items-center sm:ml-6">

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    
                    @auth
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Acceder</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrarse</a>
                        @endif
                    @endauth

                </div>
            </div>

            <!-- Hamburger -->
            <div class="mr-6 flex items-center xl:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-12 w-12" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

            @foreach ($nav_links as $link)
                
                <x-jet-responsive-nav-link href="{{ $link['route'] }}" :active="$link['active']">
                    {{$link['name']}}
                </x-jet-responsive-nav-link>

            @endforeach            
            
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                {{-- <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div> --}}
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>

