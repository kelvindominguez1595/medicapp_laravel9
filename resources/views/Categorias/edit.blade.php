@extends("layouts.template")
@section("content")
<div class="container">
    <div class="row">

        @if (session("warning"))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{session("warning")}}
        </div>
        @endif

        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{route("categorias.index")}}">
                    <i class="fa fa-home fa-fw"></i>
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <form action="{{route("categorias.update", $categoria)}}" method="POST" class="row g-3">
                @csrf
                @method("PUT")
                <div class="col-md-6">
                    <label for="categoria" class="form-label"> Titulo de la Categoria</label>
            <input type="text" class="form-control shadow-none" id="categoria" name="categoria" value="{{old("categoria", $categoria->categoria)}}">
            @error("categoria")
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>