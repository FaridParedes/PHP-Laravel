@extends('layouts.app')

@section('content')

    <h1 class="text-center">Inventario</h1>
    <h5 class="text-center">Listado de contenido de bodega</h5>
    <h5 class="text-center">{{$productos[0]->bodega}}</h5>
    <hr>
    <div class="container">
        <div class="row justify-content-center">
            <section class="col-md-8" style="margin-top: 20px;">
                <table class="table">
                        <thead class="table-primary">
                            <td>Codigo</td>
                            <td>Producto</td>
                            <td>cantidad</td>
                            @if(Auth::user()->role == "admin")
                                <td>Acciones</td>
                            @endif
                            
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @foreach ($productos as $item)
                            <tr>
                                <td>{{$item->codigo}}</td>
                                <td>{{$item->producto}}</td>
                                <td>{{$item->cantidad}}</td>
                                @if(Auth::user()->role == "admin")
                                    <td>
                                        <a class="btn btn-info btn-sm" href="/bodegas/content/edit/{{$item->codigo}}">Modificar</a>
                                        <button class="btn btn-danger btn-sm" url="/bodegas/content/destroy/{{$item->codigo}}" onclick="destroy(this)"  token="{{csrf_token()}}">Eliminar</button>
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