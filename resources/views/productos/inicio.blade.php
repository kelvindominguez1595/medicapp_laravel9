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
                    <th>Marca</th>
                    <th>Producto</th>
                    <th>Imagen</th>
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
                        <td>{{$productos->categorias_id}}</td>
                        <td>{{$productos->marcas_id}}</td>
                        <td>{{$productos->producto}}</td>
                        <td>{{$productos->image}}</td>
                        <td>{{$productos->cantidad}}</td>
                        <td>{{$productos->cantidad_minima}}</td>
                        <td>{{$productos->estado}}</td>
                        <td>{{$productos->numero_lote}}</td>
                        <td>{{$productos->fecha_expiracion}}</td>
                        <td>{{$productos->precio_venta}}</td>
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