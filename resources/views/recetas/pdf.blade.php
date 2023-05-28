<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receta</title>
</head>
<!-- CSS Code: Place this code in the document's head (between the <head> -- </head> tags) -->
<style>
    table.customTable {
        width: 100%;
        background-color: #FFFFFF;
        border-collapse: collapse;
        border-width: 2px;
        border-color: #7ea8f8;
        border-style: solid;
        color: #000000;
    }

    table.customTable td,
    table.customTable th {
        border-width: 2px;
        border-color: #7ea8f8;
        border-style: solid;
        padding: 5px;
    }

    table.customTable thead {
        background-color: #7ea8f8;
    }
</style>

<body>
    <img src="{{ public_path('image/hospital.jpg') }}"
        style="width: 60px; height: 60px; position:absolute; left: 2px; top: 5px;">
    <h3 style=" position:absolute; left: 48%; top: 3px">Clínica</h3>
    <h1 style=" position:absolute; left: 40%; top: 15px">El Nazareno</h1>
    <!-- HTML Code: Place this code in the document's body (between the <body> tags) where the table should appear -->
    <table class="customTable" style="position:absolute; left: 2px; top: 105px;">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Indicaciones</th>
                <th>SubTotal</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($detallefactura as $item)
                <tr>
                    <td>{{ $item->productos->producto }}</td>
                    <td>${{ $item->productos->precio_venta }}</td>
                    <td>{{ $item->cantidad_producto }}</td>
                    <td>{{ $item->otra_indicacion }}</td>
                    <td>${{ $item->subtotal }}</td>
                </tr>
                @php
                    $total += $item->subtotal;
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <td colspan="4">Total</td>
            <td colspan=""><span id="totalfinal" class="text-success fw-bold">${{ $total }}</span></td>
        </tfoot>
    </table>
    <!-- Generated at CSSPortal.com -->


</body>

</html>
