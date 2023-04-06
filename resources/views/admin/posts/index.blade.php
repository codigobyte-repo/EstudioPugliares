@extends('adminlte::page')

@section('title', 'Panel administrativo - Estudio Pugliares')

@section('content_header')
    <h1>Lista de publicaciones</h1>
@stop

@section('content')

    @livewire('admin.posts-index')

@stop