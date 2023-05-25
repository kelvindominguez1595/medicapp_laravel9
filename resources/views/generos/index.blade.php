@extends('layouts.template')
@section('content')
    <div class="card border-dark">
        <h5 class="card-header">Géneros</h5>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col col-sm-12">
                        @if ($mensaje = Session::get('success'))
                            <div class="alert alert-primary" role="alert">
                                {{ $mensaje }}
                            </div>
                        @endif

                        @if (count($datos) != 0)
                            <table class="table table-sm table-bordered table-hover" style="text-align: center;">
                                <thead class="center">
                                    <th>ID</th>
                                    <th>Género</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($datos as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->genero }}</td>
                                            <td>
                                                <form action="{{ route('generos.edit', $item->id) }}" method="GET"
                                                    style="display: inline;">
                                                    <button class="btn btn-warning btn-xs">Editar</button>
                                                </form>
                                                <form action="{{route("generos.show", $item->id)}}" method="GET">
                                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                                </form> 
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>                            
                        @else
                            <h4 class="alert alert-danger">No hay registros que mostrar.</h4>
                        @endif

                        <a href="{{ route('generos.create') }}" class="btn btn-primary">Agregar género</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
