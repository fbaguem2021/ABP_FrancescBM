@extends('layouts.plantilla')
@section('titulo', 'Cicles')
@section('links')
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
@endsection
@section('contenido')
    {{-- @if(count($cicles) > 0) --}}
    {{-- @include('cicles.table') --}}
    <cicle/>
    <a href="{{ url('cicle/create') }}" class="btn btn-primary floating-button">
        <i class="fa-solid fa-plus"></i> Nou Cicle
    </a>
@endsection
