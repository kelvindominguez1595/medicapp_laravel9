<?php

namespace App\Http\Controllers;

use App\Models\Generos;
use Illuminate\Http\Request;

class GenerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Generos::all();        
        return view('generos.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('generos.agregar');
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
        $genero = new Generos();
        $genero->genero = $request->post('genero');
        $genero->save();

        return redirect()->route("generos.index")->with("success", "Agregado con exito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Generos  $generos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $generos = Generos::find($id);
        return view('generos.eliminar', compact('generos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Generos  $generos
     * @return \Illuminate\Http\Response
     */
    public function edit($id_genero)
    {
        //
        $generos = Generos::find($id_genero);
        return view('generos.actualizar', compact('generos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Generos  $generos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $generos = Generos::find($id);
        $generos->genero = $request->post('genero');
        $generos->save();

        return redirect()->route("generos.index")->with("success", "Información actualizada");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Generos  $generos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_genero)
    {
        //        
        $genero = Generos::find($id_genero);
        $genero->delete();
        return redirect()->route("generos.index")->with("success", "Registro eliminado.");
    }
}
