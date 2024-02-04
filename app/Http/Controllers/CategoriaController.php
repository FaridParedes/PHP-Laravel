<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use App\Models\Entrada;
use App\Models\Product;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\MarcaProducto;
use App\Models\BodegaProducto;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $categorias = Categoria::all();

        return view('/categorias/show')->with(['categorias' => $categorias]);
    }

    public function create(){
        return view('/categorias/create');
    }

    public function store(Request $request){

        $data = request()->validate([
            'nombre' => 'required'
        ]);
        Categoria::create($data);

        return redirect('/categorias/show');
    }

    public function edit(Categoria $categoria){
        return view('/categorias/update')->with(['categoria'=>$categoria]);
    }

    public function update(Request $request, Categoria $categoria){
    
        $data = request()->validate([
            'nombre' => 'required'
        ]);

        $categoria->nombre = $data['nombre'];

        $categoria->save();

        return redirect('/categorias/show');
    }

    public function destroy($id){

        $codigos = product::all()->where('id_categoria', $id);
        foreach ($codigos as $item) {
            Entrada::where('id_producto', $item->codigo)->delete();
            Salida::where('id_producto', $item->codigo)->delete();
            BodegaProducto::where('id_producto', $item->codigo)->delete();
            MarcaProducto::where('id_producto', $item->codigo)->delete();
        }

        Product::where('id_categoria', $id)->delete();
        Categoria::destroy($id);

        return response()->json(array('res' => true));
    }
}
