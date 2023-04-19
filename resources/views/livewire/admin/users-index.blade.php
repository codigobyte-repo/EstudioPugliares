<div>
    
    @if (session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="card">

        <div class="card-header">
            <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input wire:model="search" type="text" class="form-control" placeholder="Ingrese él nombre de usuario que desea buscar">
            </div>
        </div>

        @if($users->count())

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre de usuario</th>
                            <th>Mail</th>
                            <th colspan="2">Operaciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $counter=1;?>
                        @foreach ($users as $user)
                            <tr>
                                <td><?php echo $counter;?></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', $user) }}">Cambiar Rol</a>
                                </td>
                            </tr>
                        <?php $counter++;?>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            
            <div class="card-body">
                <strong>No hay resultados para su búsqueda</strong>
            </div>

        @endif

    </div>

</div>

