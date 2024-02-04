@extends('layouts.app')

@section('content')

    <h1 class="text-center">Inventario</h1>
    <h5 class="text-center">Listado de entradas</h5>
    <hr>

    <div class="container">
        @if(Auth::user()->role == "admin")
            <div>
                <a class="btn btn-primary" href="/entradas/create">Agregar entrada</a> 
            </div>
        @endif
        <section style="margin-top: 20px;">
            <table class="table table-content text-center ">
                    <thead class="table-primary">
                        <td>C&oacute;digo</td>
                        <td>Producto</td>
                        <td>Proveedor</td>
                        <td>Bodega</td>
                        <td>Fecha</td>
                        <td>precio</td>
                        <td>cantidad</td>
                        @if(Auth::user()->role == "admin")
                            <td>Acciones</td>
                        @endif
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    @foreach ($entradas as $item)
                        <tr>
                            <td>{{$item->codigo}}</td>
                            <td>{{$item->producto}}</td>
                            <td>{{$item->proveedor}}</td>
                            <td>{{$item->bodega}}</td>
                            <td>{{$item->fecha}}</td>
                            <td>{{$item->precio_adquisicion}}</td>
                            <td>{{$item->cantidad}}</td>
                            @if(Auth::user()->role == "admin")
                            <td>
                                <a class="btn btn-info btn-sm" href="/entradas/edit/{{$item->codigo}}">Modificar</a>
                                <button class="btn btn-danger btn-sm" url="/entradas/destroy/{{$item->codigo}}" onclick="destroy(this)"  token="{{csrf_token()}}">Eliminar</button>
                            </td>
                            @endif
                        </tr>
                    @endforeach
        
                </tbody>
              </table>
        </section>
    </div>


@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/CRUD.js')}}"></script>
@endsection