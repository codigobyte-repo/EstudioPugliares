@extends('adminlte::page')

@section('title', 'Panel administrativo - Estudio Pugliares')

@section('content_header')
    <h1>Lista de roles</h1>
@stop

@section('content')

    @if (session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

          
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('admin.roles.create')}}">Agregar nueva rol</a>
        </div>
        

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rol</th>
                        <th colspan="2">Operaciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $counter=1;?>
                    @foreach ($roles as $role)
                        <tr>
                            <td><?php echo $counter;?></td>
                            
                            <td>{{ $role->name }}</td>
                            
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit', $role) }}">Editar</a>
                            </td>
                            
                            <td width="10px">
                                <form action="{{ route('admin.roles.destroy', $role)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                            
                        </tr>
                    <?php $counter++;?>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@stop