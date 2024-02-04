@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-bg-dark mb-3">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body justify-content-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="text-center">Bienvenido {{ Auth::user()->name }}</h1>
                    <h3 class="text-center">Escoge una opción en la barra de navegación</h3>

                    <img src="{{asset('img/Logonegro.png')}}" class="rounded mx-auto d-block" style="width:35%;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
