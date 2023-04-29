@extends('adminlte::page')

@section('title', 'Panel administrativo - Estudio Pugliares')

@section('content_header')
    <h1>Crear nueva servicio</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
        {!! Form::open(['route' => 'admin.servicios.store']) !!}
            
            <div class="form-group">
                {!! Form::label('titulo', 'Título') !!}
                {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del servicio']) !!}

                @error('titulo')
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
                {!! Form::label('descripcion_corta', 'Descripción corta') !!}
                {!! Form::text('descripcion_corta', null, ['class' => 'form-control', 'placeholder' => 'Ingrese descripción corta servicio']) !!}

                @error('descripcion_corta')
                    <span class="text-danger text-small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('descripcion_larga', 'Descripción larga') !!}
                {!! Form::text('descripcion_larga', null, ['class' => 'form-control', 'placeholder' => 'Ingrese descripción larga servicio']) !!}

                @error('descripcion_larga')
                    <span class="text-danger text-small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <p class="font-weight-bold">Descuento:</p>
                <label class="mr-2">
                    {!! Form::radio('descuento', 1, true) !!}
                    Si
                </label>
                <label class="mr-2">
                    {!! Form::radio('descuento', 0) !!}
                    No
                </label>
            
                @error('descuento')
                    <br>
                    <span class="text-danger text-small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <p class="font-weight-bold">Planes:</p>
                <label class="mr-2">
                    {!! Form::radio('planes', 1, true) !!}
                    Empresarial
                </label>
                <label class="mr-2">
                    {!! Form::radio('planes', 2) !!}
                    Independiente
                </label>
                <label class="mr-2">
                    {!! Form::radio('planes', 3) !!}
                    Profesional
                </label>
            
                @error('planes')
                    <br>
                    <span class="text-danger text-small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('precio_tachado', 'Precio tachado') !!}
                {!! Form::label('info', 'Precio tachado: Simula ser un descuento del servicio, siempre agregar un valor superior al precio de venta', ['class' => 'badge badge-secondary']) !!}
                {!! Form::text('precio_tachado', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el precio tachado superior al precio real']) !!}

                @error('precio_tachado')
                    <span class="text-danger text-small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('precio', 'Precio REAL del servicio') !!}
                {!! Form::text('precio', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el precio del servicio']) !!}

                @error('precio')
                    <span class="text-danger text-small">{{ $message }}</span>
                @enderror
            </div>

            {!! Form::submit('Crear servicio', ['class' => 'btn btn-primary mb-2']) !!}

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
    </style>
@endsection

@section('js')

    <script>
        // Obtener los elementos de los inputs
        const nameInput = document.querySelector('input[name="titulo"]');
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