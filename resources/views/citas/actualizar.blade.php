@extends('layouts.template')
@section('content')

<div class="row">
  <div class="col col-sm-5">
    <div class="card border-dark">
      <div class="card-body">
        <h5 class="card-title">Actualizar reserva.</h5>
        <p class="card-text">
          <form action="{{ route('reservas.update', $reservas->id)}}" method="POST">
            @csrf
            @method("PUT")
              <div class="form-group">
                  <label for="desc">Fecha:</label>
                  <input class="form-control" type="date" name="fecha" value="{{$reservas->fecha}}" required>
              </div>
              <br>
              <div class="form-group">
                  <label for="desc">Hora:</label>
                  <input class="form-control" type="time" name="hora" value="{{$reservas->hora}}" required>
              </div>
              <br>
              <div class="form-group">
                  <label for="desc">Descripción de cita:</label>
                  <textarea class="form-control" name="desc" id="desc" rows="3" required>{{$reservas->descripcion}}</textarea>
              </div>
              <br>
              <div class="form-group">
                  <label for="start">Paciente asignado:</label>
                  <select class="form-control" name="paciente_id_antiguo">                  
                      @foreach ($datos_Usuarios as $item)
                        @if ($reservas->paciente_id == $item->id)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                        @endif                                                                        
                      @endforeach
                  </select>
              </div>
              <br>
              <div class="form-group">
                  <label for="start">Doctor asignado:</label>
                  <select class="form-control" name="doctor_id_antiguo">
                    @foreach ($datos_Usuarios as $item)
                      @if ($reservas->doctor_id == $item->id)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                      @endif                                                                        
                    @endforeach                    
                  </select>
              </div>
              <hr class="card border-dark">
              <div class="form-group">
                  <b>Si desea asignar otro paciente debera seleccionarlo a continuación:</b>
                  <br>
                  <label for="start">Paciente a asignar:</label>
                  <select class="form-control" name="paciente_id_nuevo" id="" required>
                    <option value="Seleccionar">Seleccionar</option>
                    @foreach ($datos_Usuarios as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
              </div>            
              <hr class="card border-dark">
              <div class="form-group">
                  <b>Si desea asignar otro doctor debera seleccionarlo a continuación:</b>
                  <br>
                  <label for="start">Doctor a asignar:</label>
                  <select class="form-control" name="doctor_id_nuevo" id="" required>
                    <option value="Seleccionar">Seleccionar</option>
                    @foreach ($datos_Usuarios as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
              </div>
              <hr class="card border-dark">
              <br>
              <a href="{{route("reservas.index")}}" class="btn btn-info">Regresar</a>
              <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Actualizar</a>            
        </p>    
      </div>
    </div>
  </div>
</div>


  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Desea actualizar la información?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Debe estar seguro de realizar los cambios.          
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>                                            
            <button class="btn btn-primary">Actualizar</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <br>
@endsection