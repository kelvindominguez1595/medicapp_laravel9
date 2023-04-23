@extends('layouts.template')
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Agregar género</h5>
      <p class="card-text">
        <form action="{{ route('generos.store')}}" method="POST">
          @csrf
            <label for="">Género</label>
            <input type="text" name="genero" class="form-control" required>            
            <br>
            <a href="{{route("generos.index")}}" class="btn btn-info">Regresar</a>
            <button class="btn btn-primary">Agregar</button>
        </form>
      </p>
    
    </div>
  </div>

@endsection