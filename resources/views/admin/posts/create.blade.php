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
            
            <div class="form-group">
                {!! Form::label('name', 'Nombre de la publicación') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la publicación']) !!}

                @error('name')
                    <span class="text-danger text-small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::label('info', 'El Slug es la dirección que aparecerá en la Url', ['class' => 'badge badge-secondary']) !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Nombre del slug', 'readonly']) !!}

                @error('slug')
                    <span class="text-danger text-small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Categoría') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

                @error('category_id')
                    <span class="text-danger text-small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <p class="font-weight-bold">Etiquetas:</p>

                @foreach ($tags as $tag)
                    <label class="mr-2">
                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                        {{ $tag->name }}
                    </label>
                @endforeach

                @error('tags')
                    <br>
                    <span class="text-danger text-small">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <p class="font-weight-bold">Estado:</p>
                <label class="mr-2">
                    {!! Form::radio('status', 1, true) !!}
                    Borrador
                </label>
                <label class="mr-2">
                    {!! Form::radio('status', 2) !!}
                    Publicado
                </label>

                @error('status')
                    <br>
                    <span class="text-danger text-small">{{ $message }}</span>
                @enderror
            </div>

            <div class="image-section">

                <div class="row mb-3">
                    <div class="col">
                        {!! Form::label('imagen', 'Imagen de la publicación por defecto') !!}
                        <div class="image-wrapper">
                            <img id="picture" src="{{ asset('images/background-default.png') }}" alt="Imagen por defecto">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('file', 'Imagen portada de la publicación') !!}
                            {{ Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) }}
                            
                            @error('file')
                                <br>
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror

                        </div>
                        
                        <p>IMPORTANTE: Las imágenes en blanco no permiten que el título de la publicación se vea de forma clara. Utiliza imagenes con fondos oscuros. 
                        El formato de las imágenes debe ser .JPG y/o .PNG.
                        </p>

                    </div>
                </div>
            </div>

            <div class="form-group">                
                {!! Form::label('extract', 'Breve descripción') !!}
                {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

                @error('extract')
                    <span class="text-danger text-small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">                
                {!! Form::label('body', 'Contenido de la descripción') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

                @error('body')
                    <span class="text-danger text-small">{{ $message }}</span>
                @enderror
            </div>

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