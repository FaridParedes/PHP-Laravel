<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Bodega;
use App\Models\Salida;
use App\Models\Entrada;
use App\Models\Product;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    //ProductosXbodegas
    public function show(){
        $bodegas = Bodega::all();

        return view('/products/select')->with(['bodegas'=>$bodegas]);
        
    }

    public function validar(Request $request){
        $array = $request->validate([
            "id_bodegas" => 'required'
        ]);
        
        $codigo = intval($array["id_bodegas"]);
        
        $productos = DB::table('productos')
        ->select('bodegasproductos.codigo','bodegas.nombre as bodega','productos.codigo as codigo_producto'  ,'productos.nombre as producto', 'bodegasproductos.cantidad')
        ->join('bodegasproductos', 'productos.codigo', '=', 'bodegasproductos.id_producto')
        ->join('bodegas', 'bodegasproductos.id_bodega', '=', 'bodegas.codigo')
        ->where('bodegas.codigo', $codigo)
        ->get();

        $pdf =Pdf:: loadView("/reports/productosXbodega", compact('productos'));
        
        return $pdf->stream('productos.pdf');
    }

    //public function productoxbodega($codigo){}

//Reportes de Entradas x Bodegas

public function showE(){
    $bodegas = Bodega::all();

    return view('/entradas/select')->with(['bodegas'=>$bodegas]);
    
}

public function validarE(Request $request){
    $array = $request->validate([
        "id_bodegas" => 'required'
    ]);

    $codigo = intval($array["id_bodegas"]);

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
    ->where('bodegas.codigo',$codigo)
    ->get();

    $pdf = Pdf:: loadView('/reports/entradasXbodegas', compact('entradas'));

    return $pdf->stream('entradas.pdf');
}

//public function entradasxbodegas($codigo){}

//Reportes de Salidas x Bodegas

public function showS(){
    $bodegas = Bodega::all();

    return view('/salidas/select')->with(['bodegas'=>$bodegas]);
    
}


public function validarS(Request $request){
    $array = $request->validate([
        "id_bodegas" => 'required'
    ]);

    $codigo = intval($array["id_bodegas"]);
    
    $salidas = Salida::select(
        "salidas.codigo",
        "productos.nombre as producto",
        "bodegas.nombre as bodega",
        "salidas.fecha",
        "salidas.cantidad"
    )->join("productos", "productos.codigo", "=", "salidas.id_producto")
    ->join("bodegas", "bodegas.codigo", "=", "salidas.id_bodega")
    ->where('bodegas.codigo',$codigo)
    ->get();

    $pdf = Pdf:: loadView('/reports/salidasXbodegas', compact('salidas'));

    return $pdf->stream('salidas.pdf');
}

//public function salidasxbodegas($codigo){}

//Reporte de Productos por Categoria

public function showM(){
    $marcas = Marca::all();

    return view('/products/selectmarca')->with(['marcas'=>$marcas]);
    
}

public function validarM(Request $request){
    $array = $request->validate([
        "id_marcas" => 'required'
    ]);
    
    $codigo = intval($array["id_marcas"]);
    
    $productos = DB::table('productos')
    ->select('marcasproductos.id_marca','marcas.nombre as marca', 'productos.nombre as producto', 'productos.precio as precio','marcasproductos.id_producto')
    ->join('marcasproductos', 'productos.codigo', '=', 'marcasproductos.id_producto')
    ->join('marcas', 'marcasproductos.id_marca', '=', 'marcas.codigo')
    ->where('marcas.codigo', $codigo)
    ->get();

    $pdf =Pdf:: loadView("/reports/productosXmarcas", compact('productos'));
    
    return $pdf->stream('productosXmarcas.pdf');
}
//Reporte de Productos x Categoria
public function showC(){
    $categorias = Categoria::all();

    return view('/categorias/selectcategoria')->with(['categorias'=>$categorias]);
    
}

public function validarC(Request $request){
    $array = $request->validate([
        "id_categorias" => 'required'
    ]);
    
    $codigo = intval($array["id_categorias"]);
    
    $productos = DB::table('productos')
    ->select('categorias.codigo','categorias.nombre as categoria','productos.codigo as codigo_producto' ,'productos.nombre as producto', 'productos.precio')
    ->join('categorias', 'productos.id_categoria', '=', 'categorias.codigo')
    ->where('categorias.codigo', $codigo)
    ->get();

    $pdf =Pdf:: loadView("/reports/productosXcategorias", compact('productos'));
    
    return $pdf->stream('productosXcategorias.pdf');
}

}
