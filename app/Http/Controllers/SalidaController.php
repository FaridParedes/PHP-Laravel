<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Salida;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\BodegaProducto;

class SalidaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $salidas = Salida::select(
            "salidas.codigo",
            "productos.nombre as producto",
            "bodegas.nombre as bodega",
            "salidas.fecha",
            "salidas.cantidad"
        )->join("productos", "productos.codigo", "=", "salidas.id_producto")
        ->join("bodegas", "bodegas.codigo", "=", "salidas.id_bodega")
        ->get();

        return view('/salidas/show')->with(['salidas' => $salidas]);
    }

    public function create(){
        $producto = Product::all();
        $bodega = Bodega::all();

        return view('/salidas/create')->with(['producto'=> $producto, 'bodega'=>$bodega]);
    }

    public function store(Request $request){

        $data = request()->validate([
            'id_producto'=> 'required',
            'id_bodega' => 'required',
            'fecha' => 'required',
            'cantidad' => 'required'
        ]);

        $producto = Product::find($data['id_producto']);
        $bodega = Bodega::find($data['id_bodega']);
        if ($producto && $bodega) {
            $bodegaProducto = BodegaProducto::where('id_producto', $producto->codigo)
                ->where('id_bodega', $bodega->codigo)
                ->first();
        
            if ($bodegaProducto) {
                $bodegaProducto->cantidad -= $data['cantidad'];
                $bodegaProducto->save();
            } else {
                $bodegaProducto = new BodegaProducto();
                $bodegaProducto->id_producto = $producto->codigo;
                $bodegaProducto->id_bodega = $bodega->codigo;
                $bodegaProducto->cantidad = $data['cantidad'];
                $bodegaProducto->save();
            }
        }
        Salida::create($data);
        

        return redirect('/salidas/show');
    }

    public function edit(Salida $salida){
        $producto = Product::all();
        $bodega = Bodega::all();


        return view('/salidas/update')->with(['producto' => $producto, 'bodega' => $bodega,'salida'=>$salida]);
    }

    public function update(Request $request, Salida $salida){

        $data = request()->validate([
            'id_producto'=> 'required',
            'id_bodega' => 'required',
            'fecha' => 'required',
            'cantidad' => 'required'
        ]);
        $bodegaproducto = BodegaProducto::where('id_producto', $data['id_producto'])
        ->where('id_bodega',$data['id_bodega'])->first();
        if ($bodegaproducto) {
            $bodegaproducto->cantidad += $salida['cantidad'];
            $bodegaproducto->cantidad -= $data['cantidad'];
            $bodegaproducto->save();
        } else {
            $bodegaproducto = new BodegaProducto();
            $bodegaproducto->id_producto = $producto->codigo;
            $bodegaproducto->id_bodega = $bodega->codigo;
            $bodegaproducto->cantidad = $data['cantidad'];
            $bodegaproducto->save();
        }
        
        $salida->id_producto = $data['id_producto'];
        $salida->id_bodega = $data['id_bodega'];
        $salida->fecha = $data['fecha'];
        $salida->cantidad = $data['cantidad'];

        $salida->save();

        return redirect('/salidas/show');
    }

    public function destroy($id){
        $salida = Salida::find($id);
        $bodegaproducto = BodegaProducto::where('id_producto', $salida['id_producto'])
        ->where('id_bodega',$salida['id_bodega'])->first();
        if ($bodegaproducto) {
            $bodegaproducto->cantidad += $salida['cantidad'];
            $bodegaproducto->save();
        }else{
            $bodegaproducto = new BodegaProducto();
            $bodegaproducto->id_producto = $salida['id_producto'];
            $bodegaproducto->id_bodega = $salida['id_bodega'];
            $bodegaproducto->cantidad = $salida['cantidad'];
            $bodegaproducto->save();
        }
        Salida::destroy($id);

        return response()->json(array('res' => true));
    }
}
