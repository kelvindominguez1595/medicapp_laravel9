@extends('layouts.template')
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Actualizar Productos</h5>
      <p class="card-text">
        <form action="{{ route('productos.update', $productos->id)}}" method="POST">
          @csrf
          @method("PUT")
          <select name="categorias_id">
                  @foreach($categorias as $item)
                     <option  value="{{ $item->id }}">{{ $item->categoria}}</option>
                  @endforeach
               </select><br><br>
            <label for="">Producto</label>
            <input type="text" name="producto" class="form-control" required value="{{$productos->producto}}">
            <label for="">cantidad</label>
            <input type="text" name="cantidad" class="form-control" required value="{{$productos->cantidad}}">
            <label for="">Cantidad Minima</label>
            <input type="text" name="cantidad_minima" class="form-control" required value="{{$productos->cantidad_minima}}">
            <label for="">Estado</label>
            <input type="text" name="estado" class="form-control" required value="{{$productos->estado}}">
            <label for="">Número de lote</label>
            <input type="text" name="numero_lote" class="form-control" required value="{{$productos->numero_lote}}">
            <label for="">Fecha de expiración</label>
            <input type="date" name="fecha_expiracion" class="form-control" required value="{{$productos->fecha_expiracion}}">
            <label for="">Precio</label>
            <input type="text" name="precio_venta" class="form-control" required value="{{$productos->precio_venta}}">
            <br>
            <a href="{{ route("productos.index")}}" class="btn btn-info">Regresar</a>
            <button class="btn btn-primary">Agregar</button>
        </form>
      </p>
    
    </div>
  </div>



@endsection