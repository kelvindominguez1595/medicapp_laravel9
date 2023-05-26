@extends('layouts.template')
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Agregar Productos</h5>
      <p class="card-text">                    
        <form action="{{ route('productos.store')}}" method="POST">
          @csrf
          
          <label for="">Categoria</label>
          <select name="categorias_id">
                  @foreach($categorias as $item)
                     <option  value="{{ $item->id }}">{{ $item->categoria}}</option>
                  @endforeach
               </select><br><br>
            <label for="">Producto</label>
            <input type="text" name="producto" class="form-control" required><br>
            <label for="">cantidad</label>
            <input type="text" name="cantidad" class="form-control" required>
            <label for="">Cantidad Minima</label>
            <input type="text" name="cantidad_minima" class="form-control" required>
            <label for="">Estado</label>
            <input type="text" name="estado" class="form-control" required>
            <label for="">Número de lote</label>
            <input type="text" name="numero_lote" class="form-control" required>
            <label for="">Fecha de expiración</label>
            <input type="date" name="fecha_expiracion" class="form-control" required>
            <label for="">Precio</label>
            <input type="text" name="precio_venta" class="form-control" required>
            <br>
            <a href="{{ route("productos.index")}}" class="btn btn-info">Regresar</a>
            <button class="btn btn-primary">Agregar</button>
        </form>
      </p>
    </div>
  </div>



@endsection