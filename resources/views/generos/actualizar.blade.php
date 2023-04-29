@extends('layouts.template')
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Actualizar Proveedores</h5>
      <p class="card-text">
        <form action="{{ route('generos.update', $generos->id)}}" method="POST">
          @csrf
          @method("PUT")
            <label for="">Género</label>
            <input type="text" name="genero" class="form-control" required value="{{$generos->genero}}">            
            <br>
            <a href="{{route("generos.index")}}" class="btn btn-info">Regresar</a>
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Actualizar</a>            
      </p>    
    </div>
  </div>


  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Desea actualizar la información?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Debe estar seguro de realizar los cambios.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>                                            
            <button class="btn btn-primary">Actualizar</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection