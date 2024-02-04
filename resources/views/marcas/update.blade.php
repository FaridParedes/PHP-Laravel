@extends('layouts.app')

@section('content')
    <h1 class="text-center">Inventario</h1>
    <h5 class="text-center">Formulario para actualizar marcas</h5>
    <hr>
    <br>
    <br>
    <div class="container col-12 ">
        <div class="row justify-content-center" style="width=100%;">
            <div class="card col-md-8" style="background-color:#cfe2ff; border-radius:1rem; padding: 20px">
                <form action="/marcas/update/{{$marca->codigo}}" method="POST" >
                    @csrf
                    @method('PUT')
                <div class="row align-middle col-12 m-auto justify-items-center">
                    <div class="col-12">
                        Nombre
                        <input type="text" class="form-control" name="nombre" value="{{$marca->nombre}}">
                        @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-12 mt-2">
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