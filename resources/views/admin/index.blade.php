@extends('adminlte::page')

@section('title', 'Panel administrativo - Estudio Pugliares')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        
        <div class="col-sm-4">
            <div class="card bg-dark text-white usuarios">
                <div class="card-body">
                <h5 class="card-title">Usuarios</h5>
                <p class="card-text">{{ $UserCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card bg-dark text-white posts">
                <div class="card-body">
                <h5 class="card-title">Posts</h5>
                <p class="card-text">{{ $PostCount }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-sm-4">
            <div class="card bg-dark text-white mensajes">
                <div class="card-body">
                <h5 class="card-title">Contactos</h5>
                <p class="card-text">{{ $MensajesCount }}</p>
                </div>
            </div>
        </div>
  </div>
@stop

@section('css')
    <style>
        .card {
            background-image: url('imagen.jpg');
            background-size: cover;
            background-position: center;
        }
        .card.usuarios {
            background-image: url('/images/usuarios-background.jpg');
            background-size: cover;
        }

        .card.posts {
            background-image: url('/images/posts-background.jpg');
            background-size: cover;
        }

        .card.mensajes {
            background-image: url('/images/mensajes-background.jpg');
            background-size: cover;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop