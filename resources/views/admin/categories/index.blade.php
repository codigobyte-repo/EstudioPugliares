@extends('adminlte::page')

@section('title', 'Panel administrativo - Estudio Pugliares')

@section('content_header')
    <h1>Lista de Categorías</h1>
@stop

@section('content')

    @if (session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="card">

        @can('admin.categories.create')   
            <div class="card-header">
                <a class="btn btn-primary" href="{{ route('admin.categories.create')}}">Agregar nueva categoría</a>
            </div>
        @endcan

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de la categoría</th>
                        @can('admin.categories.create')
                            <th colspan="2">Operaciones</th>
                        @endcan
                    </tr>
                </thead>

                <tbody>
                    <?php $counter=1;?>
                    @foreach ($categories as $category)
                        <tr>
                            <td><?php echo $counter;?></td>
                            <td>{{ $category->name }}</td>
                            
                            @can('admin.categories.edit')
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category) }}">Editar</a>
                                </td>
                            @endcan

                            @can('admin.categories.destroy')
                                <td width="10px">
                                    <form action="{{ route('admin.categories.destroy', $category)}}" method="POST">
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