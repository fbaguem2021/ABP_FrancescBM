@php
    use App\Http\Controllers\CursController;
    use App\Classes\Utilities;
@endphp
@extends('layouts.plantilla')
@section('titulo', 'Curs')
@section('contenido')
@include('partials.mensajes')
    <div class="card mt-3 border-secondary custom-card custom-form custom-rounded">
        <div class="card-header custom-border-secondary">Curs {{ old('hola') }}</div>
        <div class="card-body">
        @if(!$insert)
            <form action="{{ action([CursController::class, 'update'], ['curs'=>$curs->id])}}" method="POST">
                @csrf
                @method('PUT')
        @else
            <form action="{{ action([CursController::class, 'store'])}}" method="POST">
                @csrf
        @endif
                <div class="mb-3 row">
                    <label for="sigles" class="col-sm-2 col-form-label">Sigles</label>
                    <div class="col-sm-10">
                    @if (!$insert)
                        <input type="text" class="form-control" name="sigles" value="{{ $curs->sigles }}" reqiored>
                    @else
                        <input type="text" class="form-control" name="sigles" value="{{ old('sigles') }}" reqiored>
                    @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                    @if(!$insert)
                        <input type="text" class="form-control" name="nom" value="{{ $curs->nom }}" required>
                    @else
                        <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" required>
                    @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="cicle" class="col-sm-2 col-form-label">Cicle</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="cicle" id="cicle">
                        @foreach ($cicles as $cicle)
                        @if(!$insert)
                            <option value="{{ $cicle->id }}" 
                                @if($cicle->id == $curs->cicles_id) selected @endif>
                                {{ $cicle->nom }}
                            </option>
                        @else
                            <option value="{{ $cicle->id }}"
                                {{ Utilities::checkCombo(old('cicle'), $cicle->id) }}>
                                {{ $cicle->nom }}
                            </option>
                        @endif
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="actiu" class="col-sm-2">Actiu</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                        @if(!$insert)
                            <input type="radio" name="actiu" id="actiu1" class="form-check-input" value="1"
                                @if($curs->actiu == 1) checked @endif>
                        @else
                            <input type="radio" name="actiu" id="actiu1" class="form-check-input" value="1"
                                @if(Utilities::checkRadio(old('actiu'), 1)) checked @endif>
                        @endif
                            <label for="" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                        @if(!$insert)
                            <input type="radio" name="actiu" id="actiu2" class="form-check-input" value="0"
                                @if($curs->actiu == 0) checked @endif>
                        @else
                            <input type="radio" name="actiu" id="actiu2" class="form-check-input" value="0"
                                @if(Utilities::checkRadio(old('actiu'), 0)) checked @endif>
                        @endif
                            <label for="" class="form-check-label">No</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row-reverse">
                    <button class="btn btn-primary mx-2 col-3 col-md-2 col-xl-1 tsize-btn"
                        type="submit"
                        >Acceptar</button>
                    <a class="btn btn-secondary mx-2 col-3 col-md-2 col-xl-1 tsize-btn"
                        href="{{ url('curs') }}"
                        >Cancel·lar</a>
                </div>
            </form>
        </div>
    </div>
@endsection