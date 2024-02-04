@extends('layouts.app')

@section('content')
    <h1 class="text-center">Inventario</h1>
    <h5 class="text-center">Listado de productos</h5>
    <hr>
    <div class="container">
        @if(Auth::user()->role == "admin")
            <div>
                <a class="btn btn-primary" href="/products/create">Agregar producto</a> 
            </div>
        @endif
        <section style="margin-top: 20px;">
            <table class="table">
                    <thead class="table-primary">
                        <td>C&oacute;digo</td>
                        <td>Nombre</td>
                        <td>Precio</td>
                        <td>Categoria</td>
                        <td>Marcas</td>
                        @if(Auth::user()->role == "admin")
                            <td>Acciones</td>
                        @endif
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    @foreach ($productos as $item)
                        <tr>
                            <td>{{$item->codigo}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->precio}}</td>
                            <td>{{$item->categoria}}</td>
                            <td>{{$item->marcas}}</td>
                            @if(Auth::user()->role == "admin")
                            <td>                                
                                <a class="btn btn-info btn-sm" href="/products/edit/{{$item->codigo}}">Modificar</a>
                                <button class="btn btn-danger btn-sm" url="/products/destroy/{{$item->codigo}}" onclick="destroy(this)"  token="{{csrf_token()}}">Eliminar</button>
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