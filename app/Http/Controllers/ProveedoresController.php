<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{

    public function index()
    {
        //pagina de inicio
        $datos = Proveedores::all();
        return view('inicio', compact('datos'));
    }

    
    public function create()
    {
        //form agregar datos
        return view('agregar');
    }

    
    public function store(Request $request)
    {
        //guardar datos bd
        $proveedores = new Proveedores();
        $proveedores->nombre = $request->post('nombre');
        $proveedores->direccion = $request->post('direccion');
        $proveedores->producto = $request->post('producto');
        $proveedores->save();

        return redirect()->route("proveedores.index")->with("success", "Agregado con exito");

    }

    
    public function show($id)
    {
        //listar datos de las tablas
        $proveedores = Proveedores::find($id);
        return view('eliminar', compact('proveedores'));
    }

    
    public function edit($id)
    {
        //sirve para traer los datos a editar
        $proveedores = Proveedores::find($id);
        return view('actualizar', compact('proveedores'));

    }

    
    public function update(Request $request, $id)
    {
        //actualiza llos datos en la bd
        $proveedores = Proveedores::find($id);
        $proveedores->nombre = $request->post('nombre');
        $proveedores->direccion = $request->post('direccion');
        $proveedores->producto = $request->post('producto');
        $proveedores->save();

        return redirect()->route("proveedores.index")->with("success", "Actualizado con exito");
    }

    
    public function destroy($id)
    {
        //elimina los datos
        $proveedores = Proveedores::find($id);
        $proveedores->delete();
        return redirect()->route("proveedores.index")->with("success", "Eliminado con exito");

    }
}
