@php
    use App\Http\Controllers\CursController;
    use App\Classes\Utilities;
@endphp
@extends('layouts.plantilla')
@section('titulo', 'Curs')
@section('contenido')
    <div class="card mt-3 border-secondary custom-card custom-form custom-rounded">
        <div class="card-header custom-border-secondary">Curs</div>
        <div class="card-body">
        @if($edit)
            <form action="{{ action([CursController::class, 'edit'], ['curs'=>$curs->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="sigles" class="col-sm-2 col-form-label">Sigles</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sigles" value="{{ $curs->sigles }}" reqiored>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nom" value="{{ $curs->nom }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="cicle" class="col-sm-2 col-form-label">Cicle</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="cicle" id="cicle">
                            @foreach ($cicles as $cicle)
                                <option value="{{ $cicle->id }}" 
                                    @if($cicle->id == $curs->cicles_id) selected @endif>
                                    {{ $cicle->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="actiu" class="col-sm-2">Actiu</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input type="radio" name="actiu" id="actiu1" class="form-check-input" value="1"
                                @if($curs->actiu == 1) checked @endif>
                            <label for="" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="actiu" id="actiu2" class="form-check-input" value="0"
                                @if($curs->actiu == 0) checked @endif>
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
        @else
            <form action="{{ action([CursController::class, 'store'])}}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="sigles" class="col-sm-2 col-form-label">Sigles</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sigles" value="{{ old('sigles') }}" reqiored>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="cicle" class="col-sm-2 col-form-label">Cicle</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="cicle" id="cicle">
                            @foreach ($cicles as $cicle)
                                <option value="{{ $cicle->id }}"
                                    {{ Utilities::checkCombo(old('cicle'), $cicle->id) }}>
                                    {{ $cicle->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="actiu" class="col-sm-2">Actiu</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input type="radio" name="actiu" id="actiu1" class="form-check-input" value="1"
                                @if(Utilities::checkRadio(old('actiu'), 1)) checked @endif>
                            <label for="" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="actiu" id="actiu2" class="form-check-input" value="0"
                                @if(Utilities::checkRadio(old('actiu'), 0)) checked @endif
                                {{--checked="true"--}} >
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
        @endif
        </div>
    </div>
@endsection