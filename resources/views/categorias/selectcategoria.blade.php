@extends('layouts.app')

@section('content')
    <h1 class="text-center">Reporte</h1>
    <h5 class="text-center">Seleccione la Categoria para generar el reporte</h5>
    <hr>
    <div class="container">
        <form class="row row-cols-lg-auto g-3 align-items-center" style="margin-top: 10px;" action="/reports/productos-categorias/validate" method="POST">
            @csrf
            <div class="col-12">
                <label class="visually-hidden" for="inlineFormSelectPref">Categorias</label>
                <select class="form-select" id="inlineFormSelectPref" name="id_categorias">
                    @foreach ($categorias as $item)
                    <option value="{{$item->codigo}}">{{$item->nombre}}</option>
                    @endforeach
                </select>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary">PDF</button>
              </div>
        </form>
    </div>
@endsection