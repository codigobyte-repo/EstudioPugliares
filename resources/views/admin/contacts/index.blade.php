@extends('adminlte::page')

@section('title', 'Panel administrativo - Estudio Pugliares')

@section('content_header')
    <h1>Lista de Contactos - Formulario del Sitio Web</h1>
@stop

@section('content')

    @if (session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="card">

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>nombre</th>
                        <th>apellido</th>
                        <th>email</th>
                        <th>whatsapp</th>
                        <th>mensaje</th>
                        <th colspan="2">Operaciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $counter=1;?>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td><?php echo $counter;?></td>
                            <td>{{ $contact->nombre }}</td>
                            <td>{{ $contact->apellido }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->whatsapp }}</td>
                            <td>{{ $contact->mensaje }}</td>
                            <td width="10px">
                                <form action="{{ route('admin.contacts.destroy', $contact)}}" method="POST">
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