<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Categorias;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        //pagina de inicio222
        $datos = Productos::all();
        return view('productos/inicio', compact('datos'));
    }

    
    public function create()
    {
       //form agregar datos
       $categorias = Categorias::all();
       return view('productos/agregar', compact('categorias'));
    }

    
    public function store(Request $request)
    {

        //guardar datos bd
        $categorias_id = $request->categorias_id;
        $producto = $request->producto;
        $cantidad = $request->cantidad;
        $cantidad_minima = $request->cantidad_minima;
        $estado = $request->estado;
        $numero_lote = $request->numero_lote;
        $fecha_expiracion = $request->fecha_expiracion;
        $precio_venta = $request->precio_venta;

        $productos = new Productos;
       
        $productos->categorias_id = $categorias_id;
        $productos->producto = $producto;
        $productos->cantidad = $cantidad;
        $productos->cantidad_minima = $cantidad_minima;
        $productos->estado = $estado;
        $productos->numero_lote = $numero_lote;
        $productos->fecha_expiracion = $fecha_expiracion;
        $productos->precio_venta = $precio_venta;
        $productos->save();

        return redirect()->route("productos.index")->with("success", "Agregado con exito");

        
    }

    
    public function show($id)
    {
        //listar datos de las tablas
        $productos = Productos::find($id);
        return view('productos/eliminar', compact('productos'));
    }


    public function edit($id)
    {
        //sirve para traer los datos a editar
        $categorias = Categorias::all();
        $productos = Productos::find($id);
        return view('productos/actualizar', compact('productos', 'categorias'));

    }

   
    public function update(Request $request, $id)
    {
        //actualiza llos datos en la bd
        $productos = Productos::find($id);
        $productos->categorias_id = $request->categorias_id;
        $productos->producto = $request->producto;
        $productos->cantidad = $request->cantidad;
        $productos->cantidad_minima = $request->cantidad_minima;
        $productos->estado = $request->estado;
        $productos->numero_lote = $request->numero_lote;
        $productos->fecha_expiracion = $request->fecha_expiracion;
        $productos->precio_venta = $request->precio_venta;
        $productos->save();
        return redirect()->route("productos.index")->with("success", "Agregado con exito");
    }

    public function destroy($id)
    {
        //elimina los datos
        $productos = Productos::find($id);
        $productos->delete();
        return redirect()->route("productos.index")->with("success", "Eliminado con exito");
    }
}
