@extends('adminlte::page')

@section('title', 'Panel administrativo - Estudio Pugliares')

@section('content_header')
    <h1>Editar etiqueta</h1>
@stop

@section('content')
    {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put']) !!}
                
        @include('admin.tags.partials.form')
        
        {!! Form::submit('Actualizar etiqueta', ['class' => 'btn btn-primary mb-2']) !!}

        @if (session('success'))
            <div id="success-alert" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

    {!! Form::close() !!}
@stop

@section('css')
    <style>
        #success-alert {
            display: none;
        }

        #success-alert.show {
            display: block;
        }
    </style>
@endsection

@section('js')

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

@endsection