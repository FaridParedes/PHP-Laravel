<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $proveedores = Proveedor::select(
            "proveedores.codigo",
            "proveedores.nombre",
            "proveedores.email",
            "proveedores.telefono"
        )->get();

        return view('/proveedores/show')->with(['proveedores' => $proveedores]);
    }

    public function create(){
        return view('/proveedores/create');
    }

    public function store(Request $request){

        $data = request()->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'email' => 'required'
        ]);
        Proveedor::create($data);

        return redirect('/proveedores/show');
    }

    public function edit(Proveedor $proveedor){
        return view('/proveedores/update')->with(['proveedor'=>$proveedor]);
    }

    public function update(Request $request, Proveedor $proveedor){
        $data = request()->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'email' => 'required'
        ]);

        $proveedor->nombre = $data['nombre'];
        $proveedor->email = $data['email'];
        $proveedor->telefono = $data['telefono'];

        $proveedor->save();

        return redirect('/proveedores/show');
    }

    public function destroy($id){
    
        Entrada::where('id_proveedor', $id)->delete();
        Proveedor::destroy($id);

        return response()->json(array('res' => true));
    }
}
