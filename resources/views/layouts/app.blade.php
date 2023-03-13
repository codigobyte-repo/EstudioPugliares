<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="En Estudio Pugliares, ofrecemos servicios contables profesionales para empresas y particulares. Nuestro equipo de expertos contadores trabaja diligentemente para proporcionar a nuestros clientes soluciones contables y financieras personalizadas, incluyendo contabilidad básica, preparación de impuestos, planificación fiscal estratégica y consultoría financiera. Nuestro objetivo es proporcionar un servicio excepcional a nuestros clientes de manera ética y responsable. ¡Contáctenos hoy para obtener más información y ver cómo podemos ayudarlo a alcanzar sus objetivos financieros!">
        <meta name="keywords" content="Servicios contables, Planificación tributaria, Auditoría Financiera, Contabilidad empresarial, Asesoría fiscal, Preparación de impuestos, Consultoría financiera, Planificación fiscal estratégica, Gestión de finanzas personales, Servicios de nómina, Auditoría financiera"> 

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Hoja de estilos personaliza --}}
        <link rel="stylesheet" type="text/css" href="/assets/css/estilos.css">

        {{-- Hoja de Efecto estilos personaliza --}}
        <link rel="stylesheet" type="text/css" href="/assets/css/efectos.css">

        {{-- Glider --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.8/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

        {{-- Glider --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.8/glider.min.js" integrity="sha512-AZURF+lGBgrV0WM7dsCFwaQEltUV5964wxMv+TSzbb6G1/Poa9sFxaCed8l8CcFRTiP7FsCgCyOm/kf1LARyxA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <!-- Styles -->
        @livewireStyles
    </head>

    <body class="montserrat antialiased">

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
