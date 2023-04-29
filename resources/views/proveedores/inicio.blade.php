@extends('layouts.template')
@section('content')

<div class="card">
    <h5 class="card-header">Proveedores</h5>
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
            <a href="{{ route("proveedores.create")}}" class="btn btn-primary">Agregar proveedores</a>
          </p>
          <hr>
      <h5 class="card-title">Listado de los proveedores</h5>
      <p>
        <div class="table table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Producto</th>
                    <th>editar</th>
                    <th>eliminar</th>
                </thead>
                <tbody>
                    @foreach ($datos as $item)
                    <tr>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->direccion}}</td>
                        <td>{{$item->producto}}</td>
                        <td>
                            <form action="{{ route("proveedores.edit", $item->id)}}" method="GET">
                                <button class="btn btn-warning btn-sm">Editar</button>
                            </form>
                          </td>
                          <td>
                            <form action="{{ route("proveedores.show", $item->id)}}" method="GET">
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