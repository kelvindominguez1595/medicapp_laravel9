<?php
namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;


class CategoriaController extends Controller
{
    //método index
    public function index()
    {
        $categorias = Categoria::orderBy("cod_categoria", "DESC")->paginate(5);
        return view("categorias.index",["categorias" =>$categorias]);
    }

    public function create()
    {
        return view('Categorias.create');
    }
    //actualizar registro??
    public function store(Request $request)
    {
        $request->validate([
            "titulo"=> "required|min:3|max:100|unique:categorias"
        ]);
        Categoria::create($request->all());
        return redirect()
        ->route("categorias.index")
        ->with ("success", "Categoria registrada correctamente");
    }
    //Realizar una consulta de un elemento en la bd por medio del modelo
    public function show(Categoria $categoria)
    {
        return view("categorias.show", ["categoria"=>$categoria]);
    }

    public function edit(Categoria $categoria)
    {
        return view("categorias.edit", ["categoria"=>$categoria]);
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            "titulo"=> "required|min:3|max:100!unique:categorias,titulo,".$categoria->cod_categoria.",cod_categoria"
        ]);
        $categoria->fill($request->only([
            "titulo"
        ]));
        if($categoria->isClean()){
            return back()->with("warning", "Debe realizar al menos un cambio para actualizar la categoria");
        }
        $categoria->update($request->all());
        return back()->with("sucess","Categoria actulizada correctamente");
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return back()->with ("danger","Categoria Eliminada");
    }

}
