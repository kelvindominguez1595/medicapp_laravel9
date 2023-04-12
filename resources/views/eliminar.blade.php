@extends('layout/plantilla')

@section("titulopagina", "Eliminar proveedor")
@section('contenido')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Eliminar Proveedores</h5>
      <p class="card-text">
        <div class="alert alert-danger" role="alert">
            Seguro de eliminar este proveedor!
            <table class="table table-sm table-hover table-bordered">
                <thead>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Producto</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$proveedores->nombre}}</td>
                        <td>{{$proveedores->direccion}}</td>
                        <td>{{$proveedores->producto}}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form action="{{route('proveedores.destroy', $proveedores->id)}}" method="POST">
                @csrf
                @method('delete')
                <a href="{{ route('proveedores.index')}}" class="btn btn-success">Regresar</a>
                <button class="btn btn-danger">Eliminar</button>
            </form>
          </div>
        
      </p>
    
    </div>
  </div>



@endsection