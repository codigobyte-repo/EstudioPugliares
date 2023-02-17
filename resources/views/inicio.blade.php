<x-app-layout>

    <div id="bg-animation" class="w-full h-screen bg-no-repeat bg-cover bg-left bg-fixed filter" style="background-color: #23153c;">
            
        <div class="grid grid-cols-1 h-screen justify-center items-center">
            <div class="text-center">
                
                <h1 class="hidden md:block z-40 text-5xl text-white font-extrabold animate__animated animate__backInDown py-4"><span class="xl:text-6xl sm:text-4xl">CONTRATÁ</span> <span class="xl:text-7xl sm:text-4xl text-purple-600 bg-white px-4">ON-LINE</span></h1>
                <h1 class="md:hidden z-40 text-5xl text-white font-extrabold animate__animated animate__backInDown py-4">CONTRATÁ ON-LINE</span></h1>
                <h1 class="z-40 sm:text-3xl text-white font-extrabold animate__animated animate__backInDown">EL MEJOR PROYECTO A TU MEDIDA</h1>

                {{-- <div class="py-10">
                    <div class="flex flex-col items-center justify-center">
                        <a href="#home_section" class="bg-purple-600 hover:bg-blue-500 text-white font-semibold hover:text-white py-2 hover:border-transparent px-6 rounded-full xl:text-3xl lg:text-2xl md:text-2xl sm:text-1xl">
                            Explorar soluciones
                        </a>
                        <div class="fixed bottom-0 left-0 right-0 mx-auto w-full max-w-7xl px-4 py-12">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <x-jet-welcome />
                            </div>
                        </div>
                    </div>
                </div> --}}
                
            </div>
        </div>
    </div>

    <section id="home_section">
        <div class="bg-wave-pattern h-6 bg-repeat-x relative -top-2"></div>
    </section>

    {{-- <div class="absolute top-36 mt-28"> --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>

    {{-- La directiva script está en app.blade.php esto permite que al cargar la pagína principal de la plantilla se ejecute el js en ese momento --}}
    @push('script')

        <script>

            /* Vanta js seleccionar el diseño aquí y cambiar también en app.blade.php */

            /* VANTA.WAVES({
            el: "#bg-animation",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00
            }) */

            VANTA.GLOBE({
            el: "#bg-animation",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            color: 0xffd13f,
            backgroundColor: 0xe0d0f
            })

            /* VANTA.NET({
            el: "#bg-animation",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200.00,
            minWidth: 200.00,
            scale: 1.00,
            scaleMobile: 1.00,
            color: 0x3f82ff,
            points: 12.00,
            spacing: 14.00
            }) */

            /* VANTA.HALO({
            el: "#bg-animation",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200.00,
            minWidth: 200.00
            }) */
        </script>
        
    @endpush
    
</x-app-layout>
