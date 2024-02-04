<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de entradasXbodega</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <h4>Bodega: {{$entradas[0]->bodega}}</h4>
    <h4>Reporte de Entradas</h4>
    <section style="margin-top: 20px;">
        <table class="table table-content text-center ">
                <thead class="table-primary">
                    <td>C&oacute;digo</td>
                    <td>Producto</td>
                    <td>Proveedor</td>
                    <td>Fecha</td>
                    <td>Precio ad</td>
                    <td>Cantidad</td>
                   
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($entradas as $item)
                    <tr>
                        <td>{{$item->codigo}}</td>
                        <td>{{$item->producto}}</td>
                        <td>{{$item->proveedor}}</td>
                        <td>{{$item->fecha}}</td>
                        <td>{{$item->precio_adquisicion}}</td>
                        <td>{{$item->cantidad}}</td>
                    </tr>
                @endforeach
    
            </tbody>
          </table>
    </section>
    
</body>
</html>