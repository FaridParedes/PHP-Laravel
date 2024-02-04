@extends('layouts.app')
@section('content')
@php
    $i = 0;   
@endphp
<h1 class="text-center">Inventario</h1>
<h5 class="text-center">Formulario para actualizar producto</h5>
<hr>
<br>
<br>
<div class="container col-12 justify-content-center">
    <div class="row justify-content-center">
        <div class="card col-md-8" style="background-color:#cfe2ff; border-radius:1rem; padding: 20px">
            <form action="/products/update/{{$producto->codigo}}" method="POST" >
                @csrf
                @method('PUT')
            <div class="row col">
                <div class="col-6">
                    Nombre
                    <input type="text" class="form-control" name="nombre" value="{{$producto->nombre}}">
                    @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-6">
                    Precio
                    <input type="text" class="form-control" name="precio" value="{{$producto->precio}}">
                    @error('precio')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12" style="margin-top: 10px">
                    Categoria
                    <select name="id_categoria" class="form-control">
                        @foreach ($categoria as $item)
                            <option value="{{$item->codigo}}" {{$item->codigo == $producto->id_categoria?'selected':''}}>{{$item->nombre}}</option>
                        @endforeach
                    </select>
                    @error('id_categoria')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12" style="margin-top: 10px">
                    Marcas
                    <div name="marca" class=" row">
                        @foreach ($marcas as $item)
                                @if ($i<count($marca)&&$item->codigo == $marca[$i]['codigo'] )
                                    <div class="col-4">
                                        <input class="form-check-input" type="checkbox" name="marca[]" value="{{$item->codigo}}" {{$item->codigo == $marca[$i]['codigo']?'checked':''}}>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{$item->nombre}}
                                        </label>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @else
                                    <div class="col-4">
                                        <input class="form-check-input" type="checkbox" name="marca[]" value="{{$item->codigo}}">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{$item->nombre}}
                                        </label>
                                    </div>
                                @endif

                        @endforeach
                    </div>
                    @error('marca')
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