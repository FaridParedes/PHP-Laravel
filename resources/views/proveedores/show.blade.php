@extends('layouts.app')

@section('content')

    <h1 class="text-center">Inventario</h1>
    <h5 class="text-center">Listado de proveedores</h5>
    <hr>
    <div class="container">
        <div class="row justify-content-center">
            <section class="col-md-8" style="margin-top: 20px;">
                @if(Auth::user()->role == "admin")
                    <div>
                        <a class="btn btn-primary" href="/proveedores/create">Agregar proveedor</a> 
                    </div>
                @endif
                <table class="table" style="margin-top: 10px;" id="proveedores">
                        <thead class="table-primary">
                            <td>C&oacute;digo</td>
                            <td>Nombre</td>
                            <td>email</td>
                            <td>tel&eacute;fono</td>
                            @if(Auth::user()->role == "admin")
                                <td>Acciones</td>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @foreach ($proveedores as $item)
                            <tr>
                                <td>{{$item->codigo}}</td>
                                <td>{{$item->nombre}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->telefono}}</td>
                                @if(Auth::user()->role == "admin")
                                <td>
                                    <a class="btn btn-info btn-sm" href="/proveedores/edit/{{$item->codigo}}">Modificar</a>
                                    <button class="btn btn-danger btn-sm" url="/proveedores/destroy/{{$item->codigo}}" onclick="destroy(this)"  token="{{csrf_token()}}">Eliminar</button>
                                </td>
                                @endif
                            </tr>
                        @endforeach
            
                    </tbody>
                </table>
            </section>
        </div>    
    </div>

    


@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/CRUD.js')}}"></script>
@endsection