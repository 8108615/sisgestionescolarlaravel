<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matricula del Estudiante</title>
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
                        <h2><u>Matricula del Estudiante</u></h2>
                    </b></td>
            <td style="width: 200px;text-align:center">
                <p>Fotografia</p>
                <img src="{{ url($matricula->estudiante->foto) }}" width="100px" alt="">
            </td>
        </tr>
    </table>
    <br>
    <table border="0" cellpadding="5" style="margin-left: 50px">
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

    <p style="text-align: justify">
        <b>Partes Contratantes</b>


        La Institucion <b>{{ $configuracion->nombre }}</b>, en adelante denominado "La Institución Educativa", representado por el <b
            style="color: blue">Lic. Erick Fernando Morales Gil</b>, con
        domicilio en av. Cumavi Calle 5 s/n. Padres/Tutores legales del estudiante <b style="color: blue">{{ $matricula->estudiante->apellidos }}
            {{ $matricula->estudiante->nombres }}</b>, en adelante denominado "El Estudiante",
        representados por <b style="color: blue">{{ $matricula->estudiante->ppff->apellidos." ".$matricula->estudiante->ppff->nombres }}</b>, con domicilio en <b
            style="color: blue">{{ $matricula->estudiante->ppff->direccion }}</b>.

        <br><br>

        <b>Términos y Condiciones:</b>
        Matrícula: Los Padres/Tutores legales matriculan al Estudiante en La Institución Educativa para el año escolar
        <b style="color: blue">{{ $matricula->grado->nombre }}</b>.

        <br><br>

        <b>Compromisos del Estudiante: </b>El Estudiante se compromete a asistir puntualmente a clases, participar
        activamente en las actividades escolares y seguir las normas
        y reglamentos establecidos por La Institución Educativa.
        <br><br>

        <b>Compromisos de los Padres/Tutores: </b>Los Padres/Tutores se comprometen a apoyar activamente la educación
        del Estudiante, mantener una comunicación regular con los maestros y cumplir con las obligaciones financieras
        relacionadas con la matrícula y las tarifas escolares.

        <br><br>

        <b>Duración del Contrato: </b>Este contrato tiene una duración de un año escolar y se renovará automáticamente
        para cada año escolar subsiguiente, a menos que cualquiera
        de las partes notifique lo contrario con al menos 10 días de antelación al inicio del nuevo año escolar.

        <br><br>

        <b>Terminación del Contrato:</b> La Institución Educativa se reserva el derecho de rescindir este contrato si el
        Estudiante o los Padres/Tutores no cumplen con las normas y reglamentos internos. <br><br>

        {{ 'Fecha: '.now()->locale('es')->isoFormat('D [de] MMM [de] YYYY') }}

    </p>
    <br><br><br>

    <table border="0" style="width: 100%">
        <tr>
            <td style="text-align: center">
                ------------------------------------------------------ <br>
                <b>La Institución Educativa</b> <br>
                Lic. Erick Fernando Morales Gil
            </td>
            <td style="text-align: center">
                ------------------------------------------------------ <br>
                <b>Padres/Tutores</b> <br>
                {{ $matricula->estudiante->ppff->apellidos." ".$matricula->estudiante->ppff->nombres }}
            </td>
        </tr>
    </table>
</body>

</html>
