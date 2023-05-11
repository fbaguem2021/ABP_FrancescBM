<div class="card border border-primary mt-2 mb-1">
    <div class="card-body">
        <h5 class="card-title">Cicles</h5>
        <table class="table custom-bordered-table border-primary">
            <thead>
                <tr>
                    <th class="col-1" scope="col">Sigles</th>
                    <th class="col-3" scope="col">Nom</th>
                    <th class="col-5" scope="col">Descripcio</th>
                    <th class="col-1 text-end" scope="col">Actiu</th>
                    <th class="col-2" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cicles as $cicle)
                <tr>
                    <td>{{ $cicle->sigles }}</td>
                    <td>{{ $cicle->nom }}</td>
                    <td>{{ $cicle->descripcio }}</td>
                    <td>
                        <div class="custom-control custom-checkbox text-end">
                            <input id="actiu" name="actiu" type="checkbox"
                            class="cistom-control-input" value="actiu"
                            @if($cicle->actiu) checked @endif>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-row-reverse">
                            <form action="{{ action([App\Http\Controllers\CicleController::class, 'destroy'], ['cicle' => $cicle->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $cicle->id }}">
                                <button type="submit" class="ms-2 btn btn-sm btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Esborrar
                                </button>
                            </form>
                            <form action="{{ action([App\Http\Controllers\CicleController::class, 'edit'], ['cicle' => $cicle->id]) }}" method="GET">
                                @csrf
                                <input type="hidden" name="id" value="{{ $cicle->id }}">
                                <button type="submit" class="btn btn-sm btn-secondary">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Editar
                                </button>
                            </form>
                        </div>

                    </td>
                </tr>
                @empty
                <div class="alert alert-primary mt-4" role="alert">
                    Encara no hi ha cap cicle donat d'alta
                </div>
                @endforelse
            </tbody>
        </table>
        {{ $cicles->links() }}
    </div>
</div>
