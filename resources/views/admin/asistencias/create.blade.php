@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de Asistencias </b></h1>
    <hr>
@stop

@section('content')

    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Asistencias Registrados - Gestion: {{ $asignacion->gestion->nombre }} - Nivel:
                            {{ $asignacion->nivel->nombre }}
                            - Grado: {{ $asignacion->grado->nombre }} - Paralelo: {{ $asignacion->paralelo->nombre }} -
                            Materia: {{ $asignacion->materia->nombre }}
                        </b></h3>
                    <div class="card-tools">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
                            Tomar Asistencia
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #007bff; color:white">
                                        <h5 class="modal-title" id="exampleModalLabel">Tomar Asistencia de Estudiantes</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/admin/asistencias/create') }}" method="POST">
                                            @csrf
                                            <input type="text" name="asignacion_id" value="{{ $asignacion->id }}" hidden>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Fecha de la Asistencia</label><b> *</b>
                                                        <input type="date" class="form-control" name="fecha" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Observacion (Opcional)</label>
                                                        <input type="text" class="form-control" name="observacion">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Estudiantes</label>
                                                        <table
                                                            class="table table-bordered table-striped table-hover table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align: center">Nro</th>
                                                                    <th style="text-align: center">Estudiante</th>
                                                                    <th style="text-align: center">C.I.</th>
                                                                    <th style="text-align: center">Asistencia</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($matriculados as $matriculado)
                                                                    <tr>
                                                                        <td style="text-align: center">
                                                                            {{ $loop->iteration }}</td>
                                                                        <td>{{ $matriculado->estudiante->apellidos }}
                                                                            {{ $matriculado->estudiante->nombres }} </td>
                                                                        <td>{{ $matriculado->estudiante->ci }}</td>
                                                                        <td style="text-align: center">
                                                                            <input type="radio"
                                                                                name="estado_asistencia[{{ $matriculado->estudiante->id }}]"
                                                                                value="PRESENTE" required> Presente
                                                                            <input type="radio"
                                                                                name="estado_asistencia[{{ $matriculado->estudiante->id }}]"
                                                                                value="FALTA" required> Falta
                                                                            <input type="radio"
                                                                                name="estado_asistencia[{{ $matriculado->estudiante->id }}]"
                                                                                value="ATRASO" required> Atraso
                                                                            <input type="radio"
                                                                                name="estado_asistencia[{{ $matriculado->estudiante->id }}]"
                                                                                value="LICENCIA" required> Licencia
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Registrar
                                                        Asistencia</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Fecha de Asistencia</th>
                                <th>Observacion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asistencias as $asistencia)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{ $asistencia->fecha }}</td>
                                    <td>{{ $asistencia->observacion }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#modalVerAsistencia{{ $asistencia->id }}">
                                            <i class="fas fa-eye"></i> Ver Asistencias
                                        </button>

                                        <!-- Modal Para Ver la Asistencia -->
                                        <div class="modal fade" id="modalVerAsistencia{{ $asistencia->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header"
                                                        style="background-color: #17a2b8; color:white;">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detalle de
                                                            Asistencias </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Estudiantes</label>
                                                                    <table
                                                                        class="table table-bordered table-striped table-hover table-sm">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="text-align: center">Nro</th>
                                                                                <th style="text-align: center">Estudiante
                                                                                </th>
                                                                                <th style="text-align: center">C.I.</th>
                                                                                <th style="text-align: center">Asistencia
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($asistencia->detalleAsistencias as $detalle)
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        {{ $loop->iteration }}</td>
                                                                                    <td>{{ $detalle->estudiante->apellidos }}
                                                                                        {{ $detalle->estudiante->nombres }}
                                                                                    </td>
                                                                                    <td>{{ $detalle->estudiante->ci }}
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $detalle->estado_asistencia }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Para Ver la Asistencia -->

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#modalEditarAsistencia{{ $asistencia->id }}">
                                            <i class="fas fa-pencil-alt"></i> Editar Asistencias
                                        </button>

                                        <!-- Modal Para Editar la Asistencia -->
                                        <div class="modal fade" id="modalEditarAsistencia{{ $asistencia->id }}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header"
                                                        style="background-color: #107c2b; color:white;">
                                                        <h5 class="modal-title" id="exampleModalLabel">Editar Asistencias
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('admin/asistencias/' . $asistencia->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="text" name="asignacion_id"
                                                                value="{{ $asignacion->id }}" hidden>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="">Fecha de la
                                                                            Asistencia</label><b> *</b>
                                                                        <input type="date"
                                                                            value="{{ $asistencia->fecha }}"
                                                                            class="form-control" name="fecha" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label for="">Observacion
                                                                            (Opcional)</label>
                                                                        <input type="text"
                                                                            value="{{ $asistencia->observacion }}"
                                                                            class="form-control" name="observacion">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="">Estudiantes</label>
                                                                        <table
                                                                            class="table table-bordered table-striped table-hover table-sm">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="text-align: center">Nro</th>
                                                                                    <th style="text-align: center">
                                                                                        Estudiante</th>
                                                                                    <th style="text-align: center">C.I.
                                                                                    </th>

                                                                                    <th style="text-align: center">
                                                                                        Asistencia</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($asistencia->detalleAsistencias as $detalle)
                                                                                    <tr>
                                                                                        <td style="text-align: center">
                                                                                            {{ $loop->iteration }}</td>
                                                                                        <td>{{ $detalle->estudiante->apellidos }}
                                                                                            {{ $detalle->estudiante->nombres }}
                                                                                        </td>
                                                                                        <td>{{ $detalle->estudiante->ci }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            <input type="radio"
                                                                                                name="estado_asistencia[{{ $detalle->estudiante->id }}]"
                                                                                                value="PRESENTE"
                                                                                                {{ $detalle->estado_asistencia == 'PRESENTE' ? 'checked' : '' }}
                                                                                                required>Presente
                                                                                            <input type="radio"
                                                                                                name="estado_asistencia[{{ $detalle->estudiante->id }}]"
                                                                                                value="FALTA"
                                                                                                {{ $detalle->estado_asistencia == 'FALTA' ? 'checked' : '' }}
                                                                                                required>Falta
                                                                                            <input type="radio"
                                                                                                name="estado_asistencia[{{ $detalle->estudiante->id }}]"
                                                                                                value="ATRASO"
                                                                                                {{ $detalle->estado_asistencia == 'ATRASO' ? 'checked' : '' }}
                                                                                                required>Atraso
                                                                                            <input type="radio"
                                                                                                name="estado_asistencia[{{ $detalle->estudiante->id }}]"
                                                                                                value="LICENCIA"
                                                                                                {{ $detalle->estado_asistencia == 'LICENCIA' ? 'checked' : '' }}
                                                                                                required>Licencia
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancelar</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success">Actualizar
                                                                        Asistencia</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Para Editar la Asistencia -->

                                        <form action="{{ url('/admin/asistencias/' . $asistencia->id) }}" method="post"
                                            id="miFormulario{{ $asistencia->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="preguntar{{ $asistencia->id }}(event)">
                                                <i class="fas fa-trash"></i> Eliminar Asistencia
                                            </button>
                                        </form>
                                        <script>
                                            function preguntar{{ $asistencia->id }}(event) {
                                                event.preventDefault();

                                                Swal.fire({
                                                    title: '¿Desea eliminar este registro?',
                                                    text: '',
                                                    icon: 'question',
                                                    showDenyButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // JavaScript puro para enviar el formulario
                                                        document.getElementById('miFormulario{{ $asistencia->id }}').submit();
                                                    }
                                                });
                                            }
                                        </script>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')
    <style>
        /* Fondo transparente y sin borde en el contenedor */
        #example1_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center;
            /* Centrar los botones */
            gap: 10px;
            /* Espaciado entre botones */
            margin-bottom: 15px;
            /* Separar botones de la tabla */
        }

        /* Estilo personalizado para los botones */
        #example1_wrapper .btn {
            color: #fff;
            /* Color del texto en blanco */
            border-radius: 4px;
            /* Bordes redondeados */
            padding: 5px 15px;
            /* Espaciado interno */
            font-size: 14px;
            /* Tamaño de fuente */
        }

        /* Colores por tipo de botón */
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
            border: none;
        }

        .btn-default {
            background-color: #6e7176;
            color: #212529;
            border: none;
        }
    </style>
@stop

@section('js')

    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Asistencias",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Asistencias",
                    "infoFiltered": "(Filtrado de _MAX_ total Asistencias)",
                    "lengthMenu": "Mostrar _MENU_ Asistencias",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [{
                        text: '<i class="fas fa-copy"></i> COPIAR',
                        extend: 'copy',
                        className: 'btn btn-default'
                    },
                    {
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        extend: 'pdf',
                        className: 'btn btn-danger'
                    },
                    {
                        text: '<i class="fas fa-file-csv"></i> CSV',
                        extend: 'csv',
                        className: 'btn btn-info'
                    },
                    {
                        text: '<i class="fas fa-file-excel"></i> EXCEL',
                        extend: 'excel',
                        className: 'btn btn-success'
                    },
                    {
                        text: '<i class="fas fa-print"></i> IMPRIMIR',
                        extend: 'print',
                        className: 'btn btn-warning'
                    }
                ]
            }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
        });
    </script>

@stop
