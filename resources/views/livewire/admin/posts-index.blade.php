<div>
    
    @if (session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="card">

        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('admin.posts.create')}}">Agregar nueva publicación</a>
        </div>

        <div class="card-header">
            <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input wire:model="search" type="text" class="form-control" placeholder="Ingrese él nombre de una publicación">
            </div>
        </div>

        @if($posts->count())

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre de la publicación</th>
                            <th colspan="2">Operaciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $counter=1;?>
                        @foreach ($posts as $post)
                            <tr>
                                <td><?php echo $counter;?></td>
                                <td>{{ $post->name }}</td>
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.edit', $post) }}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{ route('admin.posts.destroy', $post)}}" method="POST">
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

            <div class="card-footer">
                {{ $posts->links() }}
            </div>
        @else
            
            <div class="card-body">
                <strong>No hay resultados para su búsqueda</strong>
            </div>

        @endif

    </div>

</div>
