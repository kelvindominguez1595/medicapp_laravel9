@extends('layouts.template')
@section('content')
    <div class="card border-dark">
        <h5 class="card-header">
            Reservas 
            <button class="btn btn-info btn-xs" data-bs-toggle="modal" data-bs-target="#agregarCita">+</button>
        </h5>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">                    
                    <div class="col col-sm-12">

                        <div class="card text-dark bg-light">
                            <h5 class="card-header">LISTADO DE CITAS</h5>
                            <div class="card-body">
                                <table class="table table-hover" style="text-align: center;">
                                    <thead>                                        
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Descripción</th>
                                        <th>Paciente ID</th>
                                        <th>Doctor ID</th>
                                        <th>Acción</th>
                                    </thead>
        
                                    <tbody>
                                        @foreach ($datos as $item)
                                            <tr>                                                
                                                <td>{{$item->fecha}}</td>                                                
                                                <td>{{$item->hora}}</td>
                                                <td>{{$item->descripcion}}</td>
                                                @foreach ($datos_Usuarios as $item2)
                                                    @if ($item->paciente_id == $item2->id)
                                                        <td>{{$item2->name}}</td> 
                                                    @endif
                                                @endforeach
                                                @foreach ($datos_Usuarios as $item2)
                                                    @if ($item->doctor_id == $item2->id)
                                                        <td>{{$item2->name}}</td> 
                                                    @endif
                                                @endforeach
                                                <td>                                                    
                                                        <form action="{{route("reservas.edit", $item->id) }}" method="GET">
                                                            <button class="btn btn-warning btn-sm">Editar</button>
                                                        </form>
                                                        <form action="{{route("reservas.show", $item->id)}}" method="GET">
                                                            <button class="btn btn-danger btn-sm">Eliminar</button>
                                                        </form>                                                                                  
                                                </td>
                                            </tr>
                                        @endforeach                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="agregarCita" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos correspondientes.</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                
                <form action="{{ route('reservas.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="desc">Fecha:</label>
                        <input class="form-control" type="date" name="fecha" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="desc">Hora:</label>
                        <input class="form-control" type="time" name="hora" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="desc">Descripción de cita:</label>
                        <textarea class="form-control" name="desc" id="desc" rows="3" required></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="start">Paciente a asignar:</label>
                        <select class="form-control" name="paciente_id" id="" required>
                            @foreach ($datos_Usuarios as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="start">Doctor a asignar:</label>
                        <select class="form-control" name="doctor_id" id="" required>
                            @foreach ($datos_Usuarios as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>                                                                   
            </div>
            <div class="modal-footer">
                <button class="btn btn-success">Guardar</button>
            </div>
        </form> 
        </div>
    </div>
</div>
    
@endsection
