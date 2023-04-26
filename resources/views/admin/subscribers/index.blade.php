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
                        <th>email</th>
                        <th colspan="2">Operaciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $counter=1;?>
                    @foreach ($subscriptores as $subscriptor)
                        <tr>
                            <td><?php echo $counter;?></td>
                            <td>{{ $subscriptor->name }}</td>
                            <td>{{ $subscriptor->email }}</td>
                            <td width="10px">
                                <form action="{{ route('admin.subscribers.destroy', $subscriptor) }}" method="POST" id="delete-form">
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

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    document.getElementById('delete-form').addEventListener('submit', function(e) {
        var form = this;
        e.preventDefault();
        swal({
            title: "¿Estás seguro?",
            text: "Una vez eliminado, no se puede recuperar este suscriptor",
            icon: "warning",
            buttons: ["Cancelar", "Eliminar"],
            dangerMode: true,
        }).then(function(willDelete) {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
@stop