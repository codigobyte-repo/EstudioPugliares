@extends('adminlte::page')

@section('title', 'Panel administrativo - Estudio Pugliares')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
        {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
            
            @include('admin.roles.partials.form')

            {!! Form::submit('Editar rol', ['class' => 'btn btn-primary mb-2']) !!}

            @if (session('success'))
                <div id="success-alert" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

        {!! Form::close() !!}
        </div>
    </div>

@stop

@section('js')

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