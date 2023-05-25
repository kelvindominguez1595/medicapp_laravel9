@extends('layouts.template')
@section('content')

<div class="card border-dark">
    <div class="card-body border-dark">
      <h5 class="card-title">Eliminar género.</h5>
      <p class="card-text">
        <div class="alert alert-danger" role="alert">
            <b>¿Esta seguro de eliminar este género?</b>
            <hr class="card border-dark">
            <table class="table table-sm table-hover table-bordered">
                <thead>
                    <th>Nombre género</th>                    
                </thead>
                <tbody>
                    <tr>
                        <td>{{$generos->genero}}</td>                                                                        
                    </tr>
                </tbody>
            </table>
            <hr class="card border-dark">
            <form action="{{route('generos.destroy', $generos->id)}}" method="POST">
                @csrf
                @method('delete')
                <a href="{{ route('generos.index')}}" class="btn btn-success">Regresar</a>
                <button class="btn btn-danger">Eliminar</button>
            </form>
          </div>
        
      </p>
    
    </div>
  </div>



@endsection