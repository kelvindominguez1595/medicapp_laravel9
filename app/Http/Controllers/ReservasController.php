<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use App\Models\User;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos = Reservas::all();

        //$datos_Usuarios = User::find($datos->id);
        $datos_Usuarios = User::all(); 

        return view('citas.index', compact('datos','datos_Usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = validator($request->all(), [
            'hora' => [
                'required',
                function ($attribute, $value, $fail) {
                    $existingRecord = Reservas::where('hora', $value)->exists();
                    if ($existingRecord) {
                        $fail('La hora ya está en uso.');
                        return redirect()->route("reservas.index")->with("error", "Ya existe una cita a esa hora");
                    }
                },
            ],
            // otras reglas de validación para otros campos...
        ]);

        $reservas = new Reservas();
        $reservas->fecha = $request->post('fecha');                          
        $reservas->hora = $request->post('hora');
        $reservas->descripcion = $request->post('desc');
        $reservas->paciente_id = $request->post('paciente_id');
        $reservas->doctor_id = $request->post('doctor_id');
        $reservas->save();

        return redirect()->route("reservas.index")->with("success", "Agregado con exito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $datos_Usuarios = User::all(); 
        $reservas = Reservas::find($id);
        return view('citas.eliminar', compact('reservas','datos_Usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function edit($id_reserva)
    {
        //
        $reservas = Reservas::find($id_reserva);
        $datos_Usuarios = User::all(); 
        return view('citas.actualizar', compact('reservas','datos_Usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $reservas = Reservas::find($id);
        $reservas->fecha = $request->post('fecha');
        $reservas->hora = $request->post('hora');
        $reservas->descripcion = $request->post('desc');
        
        $paciente_id_antiguo = $request->post('paciente_id_antiguo');
        $doctor_id_antiguo = $request->post('doctor_id_antiguo');
        $paciente_id_nuevo = $request->post('paciente_id_nuevo');
        $doctor_id_nuevo = $request->post('doctor_id_nuevo');

        $paciente_id_insertar = 0;
        $doctor_id_insertar = 0;
        
        if($paciente_id_nuevo != "Seleccionar"){
            $reservas->paciente_id = $paciente_id_nuevo;
        }else{
            $reservas->paciente_id = $paciente_id_antiguo;
        }
        
        if($doctor_id_nuevo != "Seleccionar"){
            $reservas->doctor_id = $doctor_id_nuevo;
        }else{
            $reservas->doctor_id = $doctor_id_antiguo;
        }

        $reservas->save();

        return redirect()->route("reservas.index")->with("success", "Información actualizada");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $reservas = Reservas::find($id);
        $reservas->delete();
        return redirect()->route("reservas.index")->with("success", "Eliminado con exito");
    }
}
