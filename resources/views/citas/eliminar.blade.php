@extends('layouts.template')
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Eliminar reserva.</h5>
      <p class="card-text">
        <div class="alert alert-danger" role="alert">
            <b>¿Esta seguro de eliminar esta reservación?</b>
            <hr class="card border-dark">
            <table class="table table-sm table-hover table-bordered">
                <thead>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Descripción</th>
                    <th>Paciente</th>
                    <th>Doctor</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$reservas->fecha}}</td>
                        <td>{{$reservas->hora}}</td>
                        <td>{{$reservas->descripcion}}</td>
                        <td>
                            @foreach ($datos_Usuarios as $item)
                            @if ($reservas->paciente_id == $item->id)
                                {{$item->name}}
                            @endif
                            @endforeach                            
                        </td>
                        <td>
                            @foreach ($datos_Usuarios as $item)
                            @if ($reservas->doctor_id == $item->id)
                                {{$item->name}}
                            @endif
                            @endforeach                            
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr class="card border-dark"">
            <form action="{{route('reservas.destroy', $reservas->id)}}" method="POST">
                @csrf
                @method('delete')
                <a href="{{ route('reservas.index')}}" class="btn btn-success">Regresar</a>
                <button class="btn btn-danger">Eliminar</button>
            </form>
          </div>
        
      </p>
    
    </div>
  </div>



@endsection