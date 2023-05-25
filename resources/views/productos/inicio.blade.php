@extends('layouts.template')
@section('content')

<div class="card">
    <h5 class="card-header">Producto</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                @if ($mensaje = Session::get('success'))
                <div class="alert alert-primary" role="alert">
                    {{$mensaje }}
                  </div> 
                @endif
            </div>
        </div>
        <p>
            <a href="{{ route("productos.create")}}" class="btn btn-primary">Agregar productos</a>
          </p>
          <hr>
      <p>
        <div class="table table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                <th>Categoria</th>
                    <th>Producto</th>
                    <th>cantidad</th>
                    <th>Cantidad Minima</th>
                    <th>Estado</th>
                    <th>Número de lote</th>
                    <th>Fecha de expiración</th>
                    <th>Precio</th>
                </thead>
                <tbody>
                    @foreach ($datos as $item)
                    <tr>
                        <td>{{$item->categorias_id}}</td>
                        <td>{{$item->producto}}</td>
                        <td>{{$item->cantidad}}</td>
                        <td>{{$item->cantidad_minima}}</td>
                        <td>{{$item->estado}}</td>
                        <td>{{$item->numero_lote}}</td>
                        <td>{{$item->fecha_expiracion}}</td>
                        <td>{{$item->precio_venta}}</td>
                        <td>
                            <form action="{{ route("productos.edit", $item->id)}}" method="GET">
                                <button class="btn btn-warning btn-sm">Editar</button>
                            </form>
                          </td>
                          <td>
                            <form action="{{ route("productos.show", $item->id)}}" method="GET">
                              <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                          </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </p>
    </div>
  </div>

@endsection