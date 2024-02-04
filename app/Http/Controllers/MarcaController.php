<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use App\Models\MarcaProducto;

class MarcaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $marcas = Marca::select(
            "marcas.codigo",
            "marcas.nombre"
        )->get();

        return view('/marcas/show')->with(['marcas' => $marcas]);
    }

    public function create(){
        return view('/marcas/create');
    }

    public function store(Request $request){

        $data = request()->validate([
            'nombre' => 'required'
        ]);
        Marca::create($data);

        return redirect('/marcas/show');
    }

    public function edit(Marca $marca){
        return view('/marcas/update')->with(['marca'=>$marca]);
    }

    public function update(Request $request, Marca $marca){
        $data = request()->validate([
            'nombre' => 'required'
        ]);

        $marca->nombre = $data['nombre'];

        $marca->save();

        return redirect('/marcas/show');
    }

    public function destroy($id){
    
        MarcaProducto::where('id_marca', $id)->delete();
        Marca::destroy($id);

        return response()->json(array('res' => true));
    }
}
