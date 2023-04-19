@extends('adminlte::page')

@section('title', 'Panel administrativo - Estudio Pugliares')

@section('content_header')
    <h1>Listado de etiquetas</h1>
@stop

@section('content')

    @if (session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        @can('admin.tags.create')    
            <div class="card-header">
                <a class="btn btn-primary" href="{{ route('admin.tags.create')}}">Agregar nueva etiqueta</a>
            </div>
        @endcan

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de la etiqueta</th>
                        <th>Color</th>
                        @can('admin.tags.edit')
                            <th colspan="2">Operaciones</th>
                        @endcan
                    </tr>
                </thead>

                <tbody>
                    <?php $counter=1;?>
                    @foreach ($tags as $tag)
                        <tr>
                            <td><?php echo $counter;?></td>
                            <td>{{ $tag->name }}</td>
                            <td style="background-color: {{ $tag->color }};"></td>

                            @can('admin.tags.edit')
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.tags.edit', $tag) }}">Editar</a>
                                </td>
                            @endcan

                            @can('admin.tags.destroy')
                                <td width="10px">
                                    <form action="{{ route('admin.tags.destroy', $tag)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    <?php $counter++;?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('css')
    <style>
        .red { background-color: red; }
        .yellow { background-color: yellow; }
        .green { background-color: green; }
        .blue { background-color: blue; }
        .indigo { background-color: indigo; }
        .purple { background-color: purple; }
        .pink { background-color: pink; }
    </style>
@endsection