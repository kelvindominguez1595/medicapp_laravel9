<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        //pagina de inicio
        $datos = Productos::all();
        return view('productos/inicio', compact('datos'));
    }

    
    public function create()
    {
        //form agregar datos
        return view('productos/agregar');
    }

    
    public function store(Request $request)
    {


        
        //guardar datos bd
        $categoria_id = $request->input("categoria_id");
        $marcas_id = $request->input("marcas_id");
        $productos = $request->input("productos");
        $image = $request->input("image");
        $cantidad = $request->input("cantidad");
        $cantidad_minima = $request->input("cantidad_minima");
        $estado = $request->input("estado");
        $numero_lote = $request->input("numero_lote");
        $fecha_expiracion = $request->input("fecha_expiracion");
        $precio_venta = $request->input("precio_venta");

        $productos = new Productos;
        $categorias = Categoria::puck('id','categoria');
       
        $productos->categoria_id = $categoria_id;
        $productos->marcas = $marcas_id;
        $productos->productos = $productos;
        $productos->image = $image;
        $productos->cantidad = $cantidad;
        $productos->cantidad_minima = $cantidad_minima;
        $productos->estado = $estado;
        $productos->numero_lote = $numero_lote;
        $productos->fecha_expiracion = $fecha_expiracion;
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
        $productos = Productos::find($id);
        return view('productos/actualizar', compact('productos'));

    }

   
    public function update(Request $request, $id)
    {
        //actualiza llos datos en la bd
        $productos = Productos::find($id);
        $productos->categorias_id = $request->post('categorias_id');
        $productos->marcas_id = $request->post('marcas_id');
        $productos->producto = $request->post('producto');
        $productos->image = $request->post('image');
        $productos->cantidad = $request->post('cantidad');
        $productos->cantidad_minima = $request->post('cantidad_minima');
        $productos->estado = $request->post('estado');
        $productos->numero_lote = $request->post('numero_lote');
        $productos->fecha_expiracion = $request->post('fecha_expiracion');
        $productos->precio_venta = $request->post('precio_venta');
        $productos->save();
    }

    public function destroy($id)
    {
        //elimina los datos
        $productos = Productos::find($id);
        $productos->delete();
        return redirect()->route("productos.index")->with("success", "Eliminado con exito");
    }
}
