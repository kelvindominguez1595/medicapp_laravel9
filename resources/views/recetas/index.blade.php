@extends('layouts.template')

@section('content')
    <div class="mt-5 container-fluid">
        <div class="col-12 ">
            <form action="{{ url('/receta') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Receta
                    </div>
                    <div class="card-body table-responsive">
                        @if ($errors->any())
                            <div class="alert alert-danger text-center" role="alert">
                                <img src="{{ asset('image/kevinhart.gif') }}" alt="">
                                ¡Que intentas hacer!... No puedes registrar una receta vacía...
                            </div>
                        @endif


                        <div class="row mb-3">
                            <div class="col">
                                <label for="">Producto</label>
                                <select name="producto_id" id="producto_id" class="form-select">
                                    <option value="">Seleccione...</option>
                                    @foreach ($productos as $item)
                                        <option value="{{ $item->id }}">{{ $item->producto }} -
                                            ${{ $item->precio_venta }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Cantidad</label>
                                <input type="number" name="cantidad_producto" id="cantidad_producto" class="form-control">
                                <input type="hidden" name="cita_id" id="cita_id" class="form-control"
                                    value="{{ $reserva_id }}">
                            </div>
                            <div class="col">
                                <label for="">Cantidad por dia</label>
                                <input type="number" name="cantida_por_dia" id="cantida_por_dia" class="form-control">

                            </div>
                            <div class="col">
                                <label for="">Indicaciones</label>
                                <textarea name="otra_indicacion" id="otra_indicacion" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-6 text-end">
                                <button type="button" class="btn btn-success " id="btn-agregar">Agregar</button>
                            </div>
                            <div class="col-6 text-end">
                                <button type="submit" class="btn btn-primary " id="btn-agregar">Imprimir Receta</button>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered" id="table-canasta">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>C/DIA</th>
                                    <th>Indicación</th>
                                    <th>Subtotal</th>
                                    <th>Borrar</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <td colspan="5">Total</td>
                                <td colspan=""><span id="totalfinal" class="text-success fw-bold">$0.00</span></td>
                                <td colspan=""></td>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/receta.js') }}"></script>
@endsection
