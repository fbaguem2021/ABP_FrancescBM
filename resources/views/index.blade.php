@extends('layouts.plantilla')
@section('titulo', 'ABP Politecnics')
@section('links')
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
@endsection
@section('contenido')
    <img src="{{ asset('img/logo.jfif') }}" alt="img/logo.jfif" height="200px">
@endsection