@extends("layouts.template")
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            <a class="" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{route("categorias.index")}}">
                <i class="fa fa-home fa-fw"></i>
            </a>
        </div>
    </div>
    <div class="col-md-12">
        <form action="{{route("categorias.store")}}" method="POST" class="row g-3">
            @csrf
        <div class="col-md-6">
            <label for="categoria" class="form-label"> Titulo de la Categoria</label>
            <input type="text" class="form-control shadow-none" id="categoria" name="categoria" value="{{old("categoria")}}">
            @error("categoria")
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
</div>
<div class="col-md-12">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
</form>
</div>
</div>
</div>
    
@endsection