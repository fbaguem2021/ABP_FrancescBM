@php
    use App\Classes\Utilities;
    use App\Http\Controllers\CursController;
@endphp
<div class="card mt-2 border border-primary">
    <div class="card-body">
        <div class="card-title">Buscar</div>
        <form action="{{ action([CursController::class, 'index']) }}">
            <div class="row">
                <label class="col-sm-1" for="comboCicle">Cicle</label>
                <div class="col-sm-9">
                    <select class="form-select" name="comboCicle" id="comboCicle">
                        <option value="0">Tots els cicles</option>
                        @foreach($cicles as $cicle)
                        <option value="{{ $cicle->id }}" {{ Utilities::checkCombo(old('comboCicle'), $cicle->id) }}
                            >{{ $cicle->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-1 form-check form-check-inline custom-check-inline">
                    <input type="checkbox" class="form-check-input" id="checkActiu" name="checkActiu"
                        value="actiu" {{ Utilities::checkBuscadorCheck(old('checkActiu')) }}>
                    <label class="form-check-label" for="checkActiu">Actiu</label>
                </div>
                <div class="col-sm-1 float-right">
                    <button type="submit" class="btn btn-sm btn-secondary">
                        <i class="fa fa-magnifying-glass"></i>
                        Buscar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>