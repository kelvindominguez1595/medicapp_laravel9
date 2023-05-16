<?php
namespace App\Http\Controllers;
use App\Models\Categorias;
use Illuminate\Http\Request;


class CategoriaController extends Controller
{
    //método index
    public function index()
    {
        $categorias = Categorias::orderBy("id", "DESC")->paginate(5);
        return view("categorias.index",["categorias" =>$categorias]);
    }

    public function create()
    {
        return view("Categorias.create");
    }
    //actualizar registro??
    public function store(Request $request)
    {
        $request->validate([
            "categoria"=> "required|min:3|max:100|unique:categorias"
        ]);
        Categorias::create($request->all());
        return redirect()
        ->route("categorias.index")
        ->with ("success", "Categoria registrada correctamente");
    }
    //Realizar una consulta de un elemento en la bd por medio del modelo
    public function show(Categorias $categoria)
    {
        return view("categorias.show", ["categoria"=>$categoria]);
    }

    public function edit(Categorias $categoria)
    {
        return view("categorias.edit", ["categoria"=>$categoria]);
    }

    public function update(Request $request, Categorias $categoria)
    {
        $request->validate([
            "categoria"=> "required|min:3|max:100!unique:categorias,categoria,".$categoria->id.",id"
        ]);
        $categoria->fill($request->only([
            "categoria"
        ]));
        if($categoria->isClean()){
            return back()->with("warning", "Debe realizar al menos un cambio para actualizar la categoria");
        }
        $categoria->update($request->all());
        return back()->with("sucess","Categoria actulizada correctamente");
    }

    public function destroy(Categorias $categoria)
    {
        $categoria->delete();
        return back()->with ("danger","Categoria Eliminada");
    }

}
