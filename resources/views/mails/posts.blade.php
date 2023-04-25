<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mensaje Estudio Pugliares </title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    
    </head>
    
    <body>
        <div class="flex items-center justify-center min-h-screen p-5 bg-gray-600 min-w-screen">
            <div class="max-w-xl p-8 text-center text-gray-800 bg-white shadow-xl lg:max-w-3xl rounded-3xl lg:p-12">
                <h3 class="text-2xl">¡Nueva nota del Estudio Pugliares!</h3>                
                <p class="text-xl">Hola estimado {{ $subscriptor }}</p>
                <p>La siguiente nota que redactamos en Estudio Pugliares puede ser de tu interés:</p>
                <div class="flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>                      
                    <p class="text-base"> {{ $namePost }} </p>
                </div>
                
                
                <div class="mt-4">
                    <a href="http://www.estudiopugliares.com.ar/posts/{{ $slug }}" class="px-2 py-2 bg-black text-white">¡Ver nota ahora!</a>
                </div>
            </div>
        </div>
    
    </body>
</html>

