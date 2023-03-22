@php
    use App\Http\Controllers\CursController;
@endphp
<div class="card border border-primary mt-3">
    <div class="card-body">
        <h5 class="card-title">Cursos</h5>
        @if(!$cursos || count($cursos)==0)
        <div class="alert alert-primary mt-4 text-center" role="alert">
            Encara no hi ha cap curs donat d'alta
        </div>
        @else
        <table class="table custom-bordered-table border-primary">
            <thead>
                <tr>
                    <th class="col-1" scope="col">Sigles</th>
                    <th class="col-2" scope="col">Nom</th>
                    <th class="col-6" scope="col">Cicle</th>
                    <th class="col-1 text-end" scope="col">Actiu</th>
                    <th class="col-2" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curs)
                <tr>
                    <td>{{ $curs->sigles }}</td>
                    <td>{{ $curs->nom }}</td>
                    <td>{{ $curs->cicle->nom }}</td>
                    <td>
                        <div class="custom-control custom-checkbox text-end">
                            <input id="actiu" name="actiu" type="checkbox"
                            class="cistom-control-input" value="actiu" 
                            @if($curs->actiu) checked @endif @disabled(true)>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-row-reverse">
                            {{-- <button type="submit" class="ms-2 btn btn-sm btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i> Esborrar
                            </button> --}}
                            <button id="button-borrar" type="button" class="ms-2 btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalBorrar" data-bs-siglas="{{ $curs->sigles }}"
                                data-bs-action="{{ action([CursController::class, 'destroy'], ['curs' => $curs->id]) }}">
                                <i class="fa fa-trash" aria-hidden="true"></i> Esborrar
                            </button>
                            
                            <form action="{{ action([CursController::class, 'edit'], ['curs' => $curs->id]) }}" 
                                method="GET">
                                @csrf
                                <input type="hidden" name="id" value="{{ $curs->id }}">
                                <button type="submit" class="btn btn-sm btn-secondary">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Editar
                                </button>
                            </form>
                        </div>
                            
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $cursos->links() }}
        @endif
    </div>
</div>
<div class="border border-primary" style="width:50px;height:50px;"></div>

{{-- {{ action([CursController::class, 'destroy'], ['curs' => $curs->id]) }} --}}