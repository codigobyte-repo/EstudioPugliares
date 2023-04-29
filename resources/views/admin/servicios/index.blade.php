@extends('adminlte::page')

@section('title', 'Panel administrativo - Estudio Pugliares')

@section('content_header')
    <h1>Lista de Servicios</h1>
@stop

@section('content')

    @if (session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="card">

            <div class="card-header">
                <a class="btn btn-primary" href="{{ route('admin.servicios.create')}}">Agregar nuevo servicios</a>
            </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción de breve</th>
                        <th>Descripción larga</th>
                        <th>¿Tiene descuento?</th>
                        <th>Planes</th>
                        <th>Precio tachado</th>
                        <th>Precio de venta</th>
                        <th colspan="2">Operaciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $counter=1;?>
                    @foreach ($servicios as $servicio)
                        <tr>
                            <td><?php echo $counter;?></td>
                            <td>{{ $servicio->titulo }}</td>
                            <td>{{ $servicio->descripcion_corta }}</td>
                            <td>{{ $servicio->descripcion_larga }}</td>
                            
                            @if($servicio->descuento == 1)
                                <td><span class="badge badge-primary">SI</span></td>
                            @else
                                <td><span class="badge badge badge-danger">NO</span></td>
                            @endif

                            @if($servicio->planes == 1)
                                <td><span class="badge badge badge-success">Empresarial</span></td>
                            @elseif($servicio->planes == 2)
                                <td><span class="badge badge badge-info">Independiente</span></td>
                            @elseif($servicio->planes == 3)
                                <td><span class="badge badge badge-warning">Profesional</span></td>
                            @endif

                            <td>{{ $servicio->precio_tachado }}</td>
                            <td>{{ $servicio->precio }}</td>
                            
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.servicios.edit', $servicio) }}">Editar</a>
                            </td>

                            <td width="10px">
                                <form action="{{ route('admin.servicios.destroy', $servicio)}}" method="POST">
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