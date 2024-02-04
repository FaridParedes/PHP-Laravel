@extends('layouts.app')

@section('content')

    <h1 class="text-center">Inventario</h1>
    <h5 class="text-center">Listado de salidas</h5>
    <hr>

    <div class="container">
        @if(Auth::user()->role == "admin")
            <div>
                <a class="btn btn-primary" href="/salidas/create">Agregar salida</a> 
            </div>
        @endif
        <section style="margin-top: 20px;">
            <table class="table table-content text-center ">
                    <thead class="table-primary">
                        <td>C&oacute;digo</td>
                        <td>Producto</td>
                        <td>Bodega</td>
                        <td>Fecha</td>
                        <td>cantidad</td>
                        @if(Auth::user()->role == "admin")
                            <td>Acciones</td>
                        @endif
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    @foreach ($salidas as $item)
                        <tr>
                            <td>{{$item->codigo}}</td>
                            <td>{{$item->producto}}</td>
                            <td>{{$item->bodega}}</td>
                            <td>{{$item->fecha}}</td>
                            <td>{{$item->cantidad}}</td>
                            @if(Auth::user()->role == "admin")
                            <td>
                                <a class="btn btn-info btn-sm" href="/salidas/edit/{{$item->codigo}}">Modificar</a>
                                <button class="btn btn-danger btn-sm" url="/salidas/destroy/{{$item->codigo}}" onclick="destroy(this)"  token="{{csrf_token()}}">Eliminar</button>
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