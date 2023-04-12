@extends('layouts.template')
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Agregar Proveedores</h5>
      <p class="card-text">
        <form action="{{ route('proveedores.store')}}" method="POST">
          @csrf
          
            <label for="">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
            <label for="">Direccion</label>
            <input type="text" name="direccion" class="form-control" required>
            <label for="">Producto</label>
            <input type="text" name="producto" class="form-control" required>
            <br>
            <a href="{{ route("proveedores.index")}}" class="btn btn-info">Regresar</a>
            <button class="btn btn-primary">Agregar</button>
        </form>
      </p>
    
    </div>
  </div>



@endsection
