@extends('layouts.template')
@section('content')

<div class="card">
    <h5 class="card-header">Géneros</h5>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-sm-12">
                    @if ($mensaje = Session::get('success'))
                    <div class="alert alert-primary" role="alert">
                        {{$mensaje}}
                    </div> 
                    @endif
                    <table class="table table-sm table-bordered table-hover" style="text-align: center;">
                        <thead class="center">
                            <th>ID</th>
                            <th>Género</th>
                            <th>Acciones</th>                            
                        </thead>
                        <tbody>
                            @foreach ($datos as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->genero}}</td>                                    
                                    <td>                                        
                                        <form action="{{route("generos.edit", $item->id)}}" method="GET" style="display: inline;">
                                            <button class="btn btn-warning btn-xs">Editar</button>
                                        </form>                                        
                                        <button class="btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</button>                                        
                                    </td>                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{route("generos.create")}}" class="btn btn-primary">Agregar género</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar este registro?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Debe estar seguro si elimara este registro.
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <form action="{{route("generos.destroy", $item->id)}}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-xs">Eliminar</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection