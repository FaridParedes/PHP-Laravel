<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Salida;
use App\Models\Entrada;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\BodegaProducto;
use Illuminate\Support\Facades\DB;

class BodegaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $bodegas = Bodega::select(
            "Bodegas.codigo",
            "Bodegas.nombre",
            "Bodegas.ubicacion"
        )->get();

        return view('/bodegas/show')->with(['bodegas' => $bodegas]);
    }

    public function show(Request $request){
        $array = $request->validate([
            "id_bodegas" => 'required'
        ]);
        
        $codigo = intval($array["id_bodegas"]);
        
        $productos = DB::table('productos')
        ->select('bodegasproductos.codigo','bodegas.nombre as bodega', 'productos.nombre as producto', 'bodegasproductos.cantidad')
        ->join('bodegasproductos', 'productos.codigo', '=', 'bodegasproductos.id_producto')
        ->join('bodegas', 'bodegasproductos.id_bodega', '=', 'bodegas.codigo')
        ->where('bodegas.codigo', $codigo)
        ->get();

        return view("/bodegas/content")->with(['productos'=>$productos]);
    }

    public function content_edit(BodegaProducto $Bodega){
        return view('/bodegas/content_edit')->with(['bodega'=>$Bodega]);
    }

    public function content_update(Request $request, BodegaProducto $bodega){
        $data = request()->validate([
            'cantidad' => 'required'
        ]);

        $bodega->cantidad = $data['cantidad'];
        $bodega->save();
        
        return redirect('/bodegas/show');
    }

    public function content_destroy($id){
        BodegaProducto::destroy($id);

        return response()->json(array('res' => true));
    }

    public function create(){
        return view('/bodegas/create');
    }

    public function store(Request $request){

        $data = request()->validate([
            'nombre' => 'required',
            'ubicacion' => 'required'
        ]);
        Bodega::create($data);

        return redirect('/bodegas/show');
    }

    public function edit(Bodega $bodega){
        return view('/bodegas/update')->with(['bodega'=>$bodega]);
    }

    public function update(Request $request, Bodega $bodega){
        $data = request()->validate([
            'nombre' => 'required',
            'ubicacion' => 'required'
        ]);

        $bodega->nombre = $data['nombre'];
        $bodega->ubicacion = $data['ubicacion'];

        $bodega->save();

        return redirect('/bodegas/show');
    }

    public function destroy($id){
        Entrada::where('id_bodega', $id)->delete();
        Salida::where('id_bodega', $id)->delete();
        BodegaProducto::where('id_bodega', $id)->delete();
        Bodega::destroy($id);

        return response()->json(array('res' => true));
    }
}
