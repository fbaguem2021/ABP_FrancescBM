@extends('layouts.plantilla')
@section('titulo', 'Cicles')
@section('contenido')
    {{-- @if(count($cicles) > 0) --}}
    @include('cicles.table')
    <a href="{{ url('cicle/create') }}" class="btn btn-primary floating-button">
        <i class="fa-solid fa-plus"></i> Nou Cicle
    </a>
@endsection