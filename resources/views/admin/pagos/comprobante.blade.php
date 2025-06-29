<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pago</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table-bordered {
            border: 1px solid #000000;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000000;
        }

        .table-bordered thead th {
            border-bottom-width: 2px;
        }
    </style>
</head>

<body>
    <table border="0">
        <tr>
            <td style="text-align: center;font-size:8pt;width:200px">
                <img src="{{ url($configuracion->logo) }}" alt="" width="70px"> <br>
                <b>{{ $configuracion->nombre }}</b><br>
                {{ $configuracion->direccion }} <br>
                {{ $configuracion->telefono }} <br>
                {{ $configuracion->correo_electronico }}
            </td>
            <td style="width: 300px;text-align:center"><br><br><br><b><br><b>
                        <h2><u>Comprobante de Pago # {{ $pago->id }}</u></h2>
                    </b></td>
            <td style="width: 200px;text-align:center">
                <b>ORIGINAL</b>
            </td>
        </tr>
    </table>
    <hr>

    <table border="0" style="margin-left: 50px">
        <tr>
            <td style="width: 100px"><b>Gestión: </b></td>
            <td style="width: 170px">{{ $matricula->gestion->nombre }}</td>
            <td style="width: 100px">Nombres:</td>
            <td style="width: 220px">{{ $matricula->estudiante->nombres }}</td>
        </tr>
        <tr>
            <td><b>Turno: </b></td>
            <td>{{ $matricula->turno->nombre }}</td>
            <td>Apellidos:</td>
            <td>{{ $matricula->estudiante->apellidos }}</td>
        </tr>
        <tr>
            <td><b>Nivel: </b></td>
            <td>{{ $matricula->nivel->nombre }}</td>
            <td>C.I.:</td>
            <td>{{ $matricula->estudiante->ci }}</td>
        </tr>
        <tr>
            <td><b>Grado: </b></td>
            <td>{{ $matricula->grado->nombre }}</td>
            <td>Genero:</td>
            <td>{{ $matricula->estudiante->genero }}</td>
        </tr>
        <tr>
            <td><b>Paralelo: </b></td>
            <td>{{ $matricula->paralelo->nombre }}</td>
            <td>Teléfono:</td>
            <td>{{ $matricula->estudiante->telefono }}</td>
        </tr>
    </table>

    <hr>
    <b>Datos del Pago</b><br><br>
    <table class="table table-bordered" cellpadding="6" style="width: 100%">
        <thead>
            <tr>
                <th style="width: 100px">Monto</th>
                <th style="width: 100px">Metodo de Pago</th>
                <th style="width: 100px">Descripcion</th>
                <th style="width: 100px">Fecha de Pago</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $pago->monto }}</td>
                <td>{{ $pago->metodo_pago }}</td>
                <td>{{ $pago->descripcion }}</td>
                <td>{{ $pago->fecha_pago }}</td>
            </tr>
        </tbody>
    </table>
    <p>----------------------------------------------------------------------------------------------------------------------------------------</p>

    <table border="0">
        <tr>
            <td style="text-align: center;font-size:8pt;width:200px">
                <img src="{{ url($configuracion->logo) }}" alt="" width="70px"> <br>
                <b>{{ $configuracion->nombre }}</b><br>
                {{ $configuracion->direccion }} <br>
                {{ $configuracion->telefono }} <br>
                {{ $configuracion->correo_electronico }}
            </td>
            <td style="width: 300px;text-align:center"><br><br><br><b><br><b>
                        <h2><u>Comprobante de Pago # {{ $pago->id }}</u></h2>
                    </b></td>
            <td style="width: 200px;text-align:center">
                <b>COPIA</b>
            </td>
        </tr>
    </table>
    <hr>

    <table border="0" style="margin-left: 50px">
        <tr>
            <td style="width: 100px"><b>Gestión: </b></td>
            <td style="width: 170px">{{ $matricula->gestion->nombre }}</td>
            <td style="width: 100px">Nombres:</td>
            <td style="width: 220px">{{ $matricula->estudiante->nombres }}</td>
        </tr>
        <tr>
            <td><b>Turno: </b></td>
            <td>{{ $matricula->turno->nombre }}</td>
            <td>Apellidos:</td>
            <td>{{ $matricula->estudiante->apellidos }}</td>
        </tr>
        <tr>
            <td><b>Nivel: </b></td>
            <td>{{ $matricula->nivel->nombre }}</td>
            <td>C.I.:</td>
            <td>{{ $matricula->estudiante->ci }}</td>
        </tr>
        <tr>
            <td><b>Grado: </b></td>
            <td>{{ $matricula->grado->nombre }}</td>
            <td>Genero:</td>
            <td>{{ $matricula->estudiante->genero }}</td>
        </tr>
        <tr>
            <td><b>Paralelo: </b></td>
            <td>{{ $matricula->paralelo->nombre }}</td>
            <td>Teléfono:</td>
            <td>{{ $matricula->estudiante->telefono }}</td>
        </tr>
    </table>

    <hr>
    <b>Datos del Pago</b><br><br>
    <table class="table table-bordered" cellpadding="6" style="width: 100%">
        <thead>
            <tr>
                <th style="width: 100px">Monto</th>
                <th style="width: 100px">Metodo de Pago</th>
                <th style="width: 100px">Descripcion</th>
                <th style="width: 100px">Fecha de Pago</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $pago->monto }}</td>
                <td>{{ $pago->metodo_pago }}</td>
                <td>{{ $pago->descripcion }}</td>
                <td>{{ $pago->fecha_pago }}</td>
            </tr>
        </tbody>
    </table>

</body>

</html>
