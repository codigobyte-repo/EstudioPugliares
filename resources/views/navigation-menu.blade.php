<nav x-data="{ open: false }" class="fixed w-full bg-gradient-to-r from-black to-gray-800 z-50 cursor-pointer mb-4">
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
                    
                    {{-- Utilizamos la siguiente condicional para poder redirigirnos en el blog y en el post ya que son paginas externas --}}
                    @if (request()->route()->getName() == 'blog' || str_contains(request()->route()->uri(), 'posts'))
                        <x-jet-nav-link href="{{ url('/') }}">
                            Inicio
                        </x-jet-nav-link>
                        
                        <x-jet-nav-link href="{{ url('/') }}#servicios">
                            Servicios
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ url('/') }}#somos">
                            Quiénes Somos
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ url('/') }}#noticias">
                            Noticias
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

                        <x-jet-nav-link href="javascript:void(0);" onclick="scrollToSection('noticias')">
                            Noticias
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ url('blog') }}">
                            Blog
                        </x-jet-nav-link>

                        <x-jet-nav-link href="javascript:void(0);" onclick="scrollToSection('contacto')">
                            Contacto
                        </x-jet-nav-link>
                    @endif

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
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-800 hover:text-gray-200 focus:outline-none focus:bg-gray-500 active:bg-gray-500 transition">
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
                                <div class="block px-4 py-2 text-xs text-white">
                                    Perfil administrativo
                                </div>

                                @can('admin.home')
                                    <x-jet-dropdown-link href="{{ route('admin.home') }}">
                                        Panel Administrativo
                                    </x-jet-dropdown-link>
                                @endcan

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    Perfil
                                </x-jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                        Cerrar sesión
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-white bg-gray-600 px-2 py-2 rounded-lg">Acceder</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 mr-8 bg-gray-600 px-2 py-2 rounded-lg text-sm text-white">Registrarse</a>
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

                {{-- Utilizamos la siguiente condicional para poder redirigirnos en el blog y en el post ya que son paginas externas --}}
                @if (request()->route()->getName() == 'blog' || str_contains(request()->route()->uri(), 'posts'))
                    <x-jet-responsive-nav-link href="{{ url('/') }}">
                        Inicio
                    </x-jet-responsive-nav-link>
                    
                    <x-jet-responsive-nav-link href="{{ url('/') }}#servicios">
                        Servicios
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ url('/') }}#somos">
                        Quiénes Somos
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ url('/') }}#noticias">
                        Noticias
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ url('blog') }}" :active="request()->routeIs('blog')">
                        Blog
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ url('/') }}#contacto">
                        Contacto
                    </x-jet-responsive-nav-link>

                @else
                    <x-jet-responsive-nav-link href="{{ url('/') }}">
                        Inicio
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="javascript:void(0);" onclick="scrollToSection('servicios')">
                        Servicios
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="javascript:void(0);" onclick="scrollToSection('somos')">
                        Quiénes Somos
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="javascript:void(0);" onclick="scrollToSection('noticias')">
                        Noticias
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ url('blog') }}">
                        Blog
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="javascript:void(0);" onclick="scrollToSection('contacto')">
                        Contacto
                    </x-jet-responsive-nav-link>
                @endif           
            
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('admin.home') }}" :active="request()->routeIs('profile.show')">
                    Panel administrativo
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    Perfil
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


