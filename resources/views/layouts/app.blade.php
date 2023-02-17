<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- AOS Animate -->
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        <!-- https://animate.style/ -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

        {{-- VANTA.JS BACKGROUND ANIMATION --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/vanta@0.5.21/dist/vanta.waves.min.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.globe.min.js"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.halo.min.js"></script> --}}

        <!-- Styles -->
        @livewireStyles
    </head>

    <body class="font-sans antialiased">

        <div class="bg-gradient-to-r from-black to-gray-800">
            
            @livewire('navigation-menu')

            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <!-- AOS ANIMATE -->
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

        @stack('script')
        
    </body>
</html>
