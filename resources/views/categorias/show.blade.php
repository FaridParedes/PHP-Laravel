@extends('layouts.app')

@section('content')

    <h1 class="text-center">Inventario</h1>
    <h5 class="text-center">Listado de categorías</h5>
    <hr>

    <div class="container justify-items-center">
       
        <section class="row justify-content-center" style="width=100%;">
            <div class="col-md-8">
                @if(Auth::user()->role == "admin")
                <div>
                    <a class="btn btn-primary" href="/categorias/create">Agregar categoría</a> 
                </div>
                @endif
                <table class="table table-content text-center" style="margin-top: 20px;width:100%;">
                        <thead class="table-primary">
                            <td>C&oacute;digo</td>
                            <td>Nombre</td>
                            @if(Auth::user()->role == "admin")
                                <td>Acciones</td>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @foreach ($categorias as $item)
                            <tr>
                                <td>{{$item->codigo}}</td>
                                <td>{{$item->nombre}}</td>
                                @if(Auth::user()->role == "admin")
                                    <td>
                                        <a class="btn btn-info btn-sm" href="/categorias/edit/{{$item->codigo}}">Modificar</a>
                                        <button class="btn btn-danger btn-sm" url="/categorias/destroy/{{$item->codigo}}" onclick="destroy(this)"  token="{{csrf_token()}}">Eliminar</button>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
            
                    </tbody>
                </table>
            </div>
        </section>
    </div>


@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/CRUD.js')}}"></script>
@endsection