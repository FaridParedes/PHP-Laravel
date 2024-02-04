@extends('layouts.app')

@section('content')
<h1 class="text-center">Inventario</h1>
<h5 class="text-center">Formulario para actualizar salidas</h5>
<hr>
<br>
<br>
<div class="container col-12 justify-content-center">
    <div class="row justify-content-center">
        <div class="card col-md-8" style="background-color:#cfe2ff; border-radius:1rem; padding: 20px">
            <form action="/salidas/update/{{$salida->codigo}}" method="POST" >
                @csrf
                @method('PUT')
                <div class="row col">
                    <div class="col-6" style="margin-top: 10px">
                        Producto
                        <select name="id_producto" class="form-control">
                            @foreach ($producto as $item)
                                <option value="{{$item->codigo}}" {{$item->codigo == $salida->id_producto?'selected':''}}>{{$item->nombre}}</option>
                            @endforeach
                        </select>
                        @error('id_producto')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-6" style="margin-top: 10px">
                        Bodega
                        <select name="id_bodega" class="form-control">
                            @foreach ($bodega as $item)
                                <option value="{{$item->codigo}}" {{$item->codigo == $salida->id_bodega?'selected':''}}>{{$item->nombre}}</option>
                            @endforeach
                        </select>
                        @error('id_bodega')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-6" style="margin-top: 10px">
                        Fecha
                        <input type="date" class="form-control" name="fecha" value="{{$salida->fecha}}">
                        @error('fecha')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-6" style="margin-top: 10px">
                        Cantidad
                        <input type="text" class="form-control" name="cantidad" value="{{$salida->cantidad}}">
                        @error('cantidad')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                

                <div class="col-12 mt-2">
                    {{-- <button class="btn btn-primary" style="margin: 20px auto;" url="/products/edit/{{$item->codigo}}" onclick="modify(this)" token="{{csrf_token()}}">Guardar</button> --}}
                    <button class="btn btn-primary" style="margin: 20px auto;">Guardar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/CRUD.js')}}"></script>
@endsection