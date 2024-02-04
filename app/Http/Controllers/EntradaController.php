<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Entrada;
use App\Models\Product;
use App\Models\Proveedor;
use App\Models\EntradaCopia;
use Illuminate\Http\Request;
use App\Models\BodegaProducto;

class EntradaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $entradas = Entrada::select(
            "entradas.codigo",
            "productos.nombre as producto",
            "proveedores.nombre as proveedor",
            "bodegas.nombre as bodega",
            "entradas.fecha",
            "entradas.precio_adquisicion",
            "entradas.cantidad"
        )->join("productos", "productos.codigo", "=", "entradas.id_producto")
        ->join("proveedores", "proveedores.codigo", "=", "entradas.id_proveedor")
        ->join("bodegas", "bodegas.codigo", "=", "entradas.id_bodega")
        ->get();

        return view('/entradas/show')->with(['entradas' => $entradas]);
    }

    public function create(){
        $producto = Product::all();
        $proveedor = Proveedor::all();
        $bodega = Bodega::all();

        return view('/entradas/create')->with(['producto'=> $producto, 'proveedor'=>$proveedor, 'bodega'=>$bodega]);
    }

    public function store(Request $request){

        $data = request()->validate([
            'id_producto'=> 'required',
            'id_proveedor'=> 'required',
            'id_bodega' => 'required',
            'fecha' => 'required',
            'precio_adquisicion' => 'required',
            'cantidad' => 'required'
        ]);

        $producto = Product::find($data['id_producto']);
        $bodega = Bodega::find($data['id_bodega']);
        if ($producto && $bodega) {
            $bodegaProducto = BodegaProducto::where('id_producto', $producto->codigo)
                ->where('id_bodega', $bodega->codigo)
                ->first();
        
            if ($bodegaProducto) {
                $bodegaProducto->cantidad += $data['cantidad'];
                $bodegaProducto->save();
            } else {
                $bodegaProducto = new BodegaProducto();
                $bodegaProducto->id_producto = $producto->codigo;
                $bodegaProducto->id_bodega = $bodega->codigo;
                $bodegaProducto->cantidad = $data['cantidad'];
                $bodegaProducto->save();
            }
        }
        Entrada::create($data);
        

        return redirect('/entradas/show');
    }

    public function edit(Entrada $entrada){
        $producto = Product::all();
        $bodega = Bodega::all();
        $proveedor = Proveedor::all();


        return view('/entradas/update')->with(['producto' => $producto, 'bodega' => $bodega,'proveedor' => $proveedor,'entrada'=>$entrada]);
    }

    public function update(Request $request, Entrada $entrada){

        $data = request()->validate([
            'id_producto'=> 'required',
            'id_proveedor'=> 'required',
            'id_bodega' => 'required',
            'fecha' => 'required',
            'precio_adquisicion' => 'required',
            'cantidad' => 'required'
        ]);
        $bodegaproducto = BodegaProducto::where('id_producto', $data['id_producto'])
        ->where('id_bodega',$data['id_bodega'])->first();
        if ($bodegaproducto) {
            $bodegaproducto->cantidad -= $entrada['cantidad'];
            $bodegaproducto->cantidad += $data['cantidad'];
            $bodegaproducto->save();
        } else {
            $bodegaproducto = new BodegaProducto();
            $bodegaproducto->id_producto = $producto->codigo;
            $bodegaproducto->id_bodega = $bodega->codigo;
            $bodegaproducto->cantidad = $data['cantidad'];
            $bodegaproducto->save();
        }
        
        $entrada->id_producto = $data['id_producto'];
        $entrada->id_proveedor = $data['id_proveedor'];
        $entrada->id_bodega = $data['id_bodega'];
        $entrada->fecha = $data['fecha'];
        $entrada->precio_adquisicion = $data['precio_adquisicion'];
        $entrada->cantidad = $data['cantidad'];

        $entrada->save();

        return redirect('/entradas/show');
    }

    public function destroy($id){
        $entrada = Entrada::find($id);
        $bodegaproducto = BodegaProducto::where('id_producto', $entrada['id_producto'])
        ->where('id_bodega',$entrada['id_bodega'])->first();
        if ($bodegaproducto) {
            $bodegaproducto->cantidad -= $entrada['cantidad'];
            if($bodegaproducto->cantidad == 0){
                BodegaProducto::destroy($bodegaproducto->codigo);
            }else{
                $bodegaproducto->save();
            }
            
        }
        Entrada::destroy($id);

        return response()->json(array('res' => true));
    }
}
