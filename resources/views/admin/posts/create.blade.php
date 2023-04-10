@extends('adminlte::page')

@section('title', 'Panel administrativo - Estudio Pugliares')

@section('content_header')
    <h1>Crear nueva publicación</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
        {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}

            {!! Form::hidden('user_id', auth()->user()->id) !!}
            
                @include('admin.posts.partials.form')

            {!! Form::submit('Crear publicación', ['class' => 'btn btn-primary mb-2']) !!}

            @if (session('success'))
                <div id="success-alert" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

        {!! Form::close() !!}
        </div>
    </div>

@stop

@section('css')
    <style>
        #success-alert {
            display: none;
        }

        #success-alert.show {
            display: block;
        }

        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .image-section {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }

        .image-section h3 {
            font-size: 16px;
            margin: 0 0 10px;
        }
    </style>
@endsection

@section('js')

    {{-- Incorporamos Ckeditor5 --}}
    <script src="{{asset('assets/plugins/ckeditor5/ckeditor.js')}}"></script>

    <script>
        ClassicEditor
        .create( document.querySelector( '#extract' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ], // solo las opciones que deseas
        } )
        .catch( error => {
            console.error( error );
        } );
    </script>

    <script>
        ClassicEditor
        .create( document.querySelector( '#body' ),{
            ckfinder:{
                uploadUrl: '{{ route('ckeditor.upload').'?_token='.csrf_token()}}'
            }
        })
        .catch( error => {
            console.error( error );
        } );
    </script>   

    <script>
        // Obtener los elementos de los inputs
        const nameInput = document.querySelector('input[name="name"]');
        const slugInput = document.querySelector('input[name="slug"]');

        // Función para convertir texto a slug
        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')        // reemplazar espacios en blanco con -
                .replace(/[^\w\-]+/g, '')   // eliminar todos los caracteres que no sean palabras, espacios en blanco o -
                .replace(/\-\-+/g, '-')      // reemplazar múltiples guiones con un solo guión
                .replace(/^-+/, '')          // eliminar guiones al principio del texto
                .replace(/-+$/, '');         // eliminar guiones al final del texto
        }

        // Escuchar el evento de entrada en el input de nombre
        nameInput.addEventListener('input', function() {
            // Obtener el valor del input de nombre
            const name = this.value;

            // Convertir el texto a slug y establecer el valor del input de slug
            slugInput.value = slugify(name);
        });
    </script>
    
    <script>
        // Obtener la alerta de éxito por su ID
        const successAlert = document.getElementById('success-alert');
    
        // Si la alerta de éxito existe
        if (successAlert) {
            // Agregar la clase "show" para mostrar la alerta
            successAlert.classList.add('show');
    
            // Establecer un temporizador para eliminar la clase "show" después de 5 segundos
            setTimeout(() => {
                successAlert.classList.remove('show');
            }, 5000);
        }
    </script>

    <script>
        /* Cambiar imagen seleccionada por la previsualización */
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>

@endsection