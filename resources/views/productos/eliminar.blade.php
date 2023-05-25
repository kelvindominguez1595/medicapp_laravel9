@extends('layouts.template')
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Eliminar Productos</h5>
      <p class="card-text">
        <div class="alert alert-danger" role="alert">
            Seguro de eliminar este producto!
            <table class="table table-sm table-hover table-bordered">
                <thead>
                    <th>Categoria</th>
                    <th>Producto</th>
                    <th>cantidad</th>
                    <th>antidad Minima</th>
                    <th>Estado</th>
                    <th>Número de lote</th>
                    <th>Fecha de expiración</th>
                    <th>Precio</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$productos->categorias_id}}</td>
                        <td>{{$productos->producto}}</td>
                        <td>{{$productos->cantidad}}</td>
                        <td>{{$productos->cantidad_minima}}</td>
                        <td>{{$productos->estado}}</td>
                        <td>{{$productos->numero_lote}}</td>
                        <td>{{$productos->fecha_expiracion}}</td>
                        <td>{{$productos->precio_venta}}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form action="{{route('productos.destroy', $productos->id)}}" method="POST">
                @csrf
                @method('delete')
                <a href="{{ route('productos.index')}}" class="btn btn-success">Regresar</a>
                <button class="btn btn-danger">Eliminar</button>
            </form>
          </div>
        
      </p>
    
    </div>
  </div>



@endsection