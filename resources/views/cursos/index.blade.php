@extends('layouts.plantilla')
@section('titulo', 'Curso')
@section('contenido')
    @include('cursos.buscador')
    @include('partials.mensajes')
    @include('cursos.table')
    <div id="modalBorrar" class="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id">
              <p></p>
            </div>
            <div class="modal-footer">
                <form id="formModal" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel·lar
                    </button>
                    <button type="submit" class="ms-2 btn btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i> Esborrar
                    </button>
                </form>
            </div>
          </div>
        </div>
    </div>
      
      
    <a href="{{ url('curs/create') }}" class="btn btn-primary floating-button">
        <i class="fa-solid fa-plus"></i> Nou Curs
    </a>
@section('scripts')
    <script src="{{ asset('js/modal.js') }}"></script>
@endsection
{{-- 
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Sigles</th>
                <th scope="col">Nom</th>
                <th scope="col">Cicle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <th scope="row">{{ $curso->getId() }}</th>
                    <td>{{ $curso->getSigles() }}</td>
                    <td>{{ $curso->getNom() }}</td>
                    <td>{{ $curso->getSiglesCicle() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> 
--}}
@endsection