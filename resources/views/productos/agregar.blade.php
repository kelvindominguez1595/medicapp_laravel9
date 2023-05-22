@extends('layouts.template')
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Agregar Productos</h5>
      <p class="card-text">
        <form action="{{ route('productos.store')}}" method="POST">
          @csrf
          
          <label for="">Categoria</label>
          <select name="categoria_id">
                  @foreach(datos as $dato)
                     <option  value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                  @endforeach
               </select> 
            <label for="">Marca</label>
            <select name="marcas_id" id="input" class="form-control" required>
            <option value=""></option>
          </select>
            <label for="">Producto</label>
            <input type="text" name="productos" class="form-control" required>
            <label for="">Imagen</label>
            <input type="file" name="image" class="form-control" required>
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