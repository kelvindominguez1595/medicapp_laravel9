@extends("layouts.template")
@section('content')
<div class="container">
<div class="row">
    @if (session("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session("success")}}
        </div>
        @endif
        @if (session("danger"))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session("danger")}}
        </div>
        @endif
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Categoria" href="{{route("categorias.create")}}" role="button"> Agregar Categoria
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="col-md-12">
            @if(sizeof($categorias) >0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Acciones</th>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $categoria)
                        <tr>
                            <td class="text-center" width="20%">
                                <a href="{{route("categorias.show", $categoria)}}" class="btn btn-primary btn-sn shadow-none" data-toggle="tooltip" data-placement="top" title="Ver Categoria" role="button"> Ver
                                    <i class="fa fa-book fa-fw text-while"></i>
                                </a>
                                
                                <a href="{{route("categorias.edit", $categoria)}}" class="btn btn-success btn-sn shadow-none" data-toggle="tooltip" data-placement="top" title="Editar Categoria" role="button"> Editar
                                    <i class="fa fa-pencil fa-fw text-while"></i>
                                </a>
                                <form action="{{route("categorias.destroy",$categoria)}}" method="POST" class="d-inline-block">
                                    @csrf

                                    @method("Delete")
                                    <button  id="delete" name="delete" type="submit" class="btn btn-danger btn-sn shadow-none"
                                    data-toggle="tooltip" data-placement="top" title="Eliminar Categoria" onclick="return confirm('¿Estas seguro que vas eliminar esta categoria?')" role="button"> Eliminar
                                    <i class="fa fa-trash fa-fw"></i>
                                    </button>
                                </form>
                            </td>
                            <td scope="row">{{$categoria->id}}</td>
                            <td scope="row">{{$categoria->categoria}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $categorias->links() !!}
                </div>
            </div>
            @else
            <div class="alert alert-secondary"> No se encontraron resultados</div>
            @endif
        </div>
</div>
</div>
@endsection