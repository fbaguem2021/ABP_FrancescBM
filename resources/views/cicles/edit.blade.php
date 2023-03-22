@extends('layouts.plantilla')
@section('titulo', 'Cicle')
@section('contenido')
    <div class="card mt-3 border-secondary custom-card custom-form custom-rounded">
        <div class="card-header custom-border-secondary">Cicle</div>
        <div class="card-body">
            <form action="{{ action([App\Http\Controllers\CicleController::class, 'update'], ['cicle' => $cicle->id])}}" method="PUT">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="sigles" class="col-sm-2 col-form-label">Siglas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sigles" reqiored
                            value="{{ $cicle->sigles }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nom" required
                            value="{{ $cicle->nom }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="descripcion" class="col-sm-2 col-form-label">Descripció</label>
                    <div class="col-sm-10">
                        <textarea name="descripcion" cols="30" rows="10" class="form-control">{{ $cicle->descripcio }}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="actiu" class="col-sm-2">Actiu</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input type="radio" name="actiu" id="actiu1" class="form-check-input" value="1"
                                @if(App\Classes\Utilities::checkRadio($cicle->actiu, 1)) checked @endif>
                            <label for="" class="form-check-label">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="actiu" id="actiu2" class="form-check-input" value="0"
                                @if(App\Classes\Utilities::checkRadio($cicle->actiu, 0)) checked @endif>
                            <label for="" class="form-check-label">No</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row-reverse">
                    <button class="btn btn-primary mx-2 col-3 col-md-2 col-xl-1 tsize-btn"
                        type="submit"
                        >Acceptar</button>
                    <a class="btn btn-secondary mx-2 col-3 col-md-2 col-xl-1 tsize-btn"
                        href="{{ url('cicle') }}"
                        >Cancel·lar</a>
                </div>
            </form>
        </div>
    </div>
@endsection