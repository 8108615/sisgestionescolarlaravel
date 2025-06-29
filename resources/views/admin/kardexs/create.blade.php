@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de Reportes de Kardex </b></h1>
    <hr>
@stop

@section('content')

    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Reportes Registrados - Gestion: {{ $asignacion->gestion->nombre }} -
                            Nivel:
                            {{ $asignacion->nivel->nombre }}
                            - Grado: {{ $asignacion->grado->nombre }} - Paralelo: {{ $asignacion->paralelo->nombre }} -
                            Materia: {{ $asignacion->materia->nombre }}
                        </b></h3>
                    <div class="card-tools">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
                            Reportar Estudiantes
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #007bff; color:white">
                                        <h5 class="modal-title" id="exampleModalLabel">Reportar Kardex</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/admin/kardexs/create') }}" method="POST">
                                            @csrf
                                            <input type="text" name="asignacion_id" value="{{ $asignacion->id }}" hidden>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Periodo para el Reporte</label><b> *</b>
                                                        <select name="periodo_id" class="form-control" id=""
                                                            required>
                                                            <option value="">Seleccione el Periodo...</option>
                                                            @foreach ($periodos as $periodo)
                                                                <option value="{{ $periodo->id }}">{{ $periodo->nombre }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Observacion</label><b> *</b>
                                                        <input type="text" class="form-control" name="observacion"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Fecha del Reporte</label><b> *</b>
                                                        <input type="date" class="form-control" name="fecha" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Nota (Opcional)</label>
                                                        <input type="text" class="form-control" name="nota">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Estudiantes</label>
                                                        <div class="form-group">
                                                            <select name="estudiante_id" class="form-control" id=""
                                                                required>
                                                                <option value="">Seleccione el Estudiante...</option>
                                                                @foreach ($matriculados as $matriculado)
                                                                    <option value="{{ $matriculado->estudiante->id }}">
                                                                        {{ $matriculado->estudiante->apellidos }}
                                                                        {{ $matriculado->estudiante->nombres }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Registrar
                                                        Reporte</button>
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
                                <th>Estudiante</th>
                                <th>Periodo</th>
                                <th>observacion</th>
                                <th>Nota</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kardexs as $kardex)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td style="text-align: center">
                                        {{ $kardex->estudiante->apellidos . ' ' . $kardex->estudiante->nombres }}</td>
                                    <td>{{ $kardex->periodo->nombre }}</td>
                                    <td>{{ $kardex->observacion }}</td>
                                    <td>{{ $kardex->nota }}</td>
                                    <td>{{ $kardex->fecha }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#modalEditarReporte{{ $kardex->id }}">
                                            <i class="fas fa-eye"></i> Editar Reporte
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalEditarReporte{{ $kardex->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header"
                                                        style="background-color: #0d6e41; color:white">
                                                        <h5 class="modal-title" id="exampleModalLabel">Editar Reporte
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('/admin/kardexs/' . $kardex->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="text" name="asignacion_id"
                                                                value="{{ $asignacion->id }}" hidden>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Periodo para
                                                                            Calificaciones</label><b> *</b>
                                                                        <select name="periodo_id" class="form-control"
                                                                            id="" required>
                                                                            <option value="">Seleccione el Periodo...
                                                                            </option>
                                                                            @foreach ($periodos as $periodo)
                                                                                <option value="{{ $periodo->id }}"
                                                                                    {{ $periodo->id == $kardex->periodo_id ? 'selected' : '' }}>
                                                                                    {{ $periodo->nombre }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="">Observacion</label><b> *</b>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $kardex->observacion }}"
                                                                            name="observacion" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="">Fecha del Reporte</label><b>
                                                                            *</b>
                                                                        <input type="date" class="form-control"
                                                                            value="{{ $kardex->fecha }}" name="fecha"
                                                                            required>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label for="">Nota (Opcional)</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $kardex->nota }}" name="nota">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="">Estudiantes</label>
                                                                        <div class="form-group">
                                                                            <select name="estudiante_id"
                                                                                class="form-control" id=""
                                                                                required>
                                                                                <option value="">Seleccione el
                                                                                    Estudiante...</option>
                                                                                @foreach ($matriculados as $matriculado)
                                                                                    <option
                                                                                        value="{{ $matriculado->estudiante->id }}"
                                                                                        {{ $kardex->estudiante_id == $matriculado->estudiante->id ? 'selected' : '' }}>
                                                                                        {{ $matriculado->estudiante->apellidos }}
                                                                                        {{ $matriculado->estudiante->nombres }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

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
                                                                        Reporte</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="{{ url('/admin/kardexs/' . $kardex->id) }}"
                                            method="post" id="miFormulario{{ $kardex->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="preguntar{{ $kardex->id }}(event)">
                                                <i class="fas fa-trash"></i> Eliminar Kardex
                                            </button>
                                        </form>
                                        <script>
                                            function preguntar{{ $kardex->id }}(event) {
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
                                                        document.getElementById('miFormulario{{ $kardex->id }}').submit();
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
            </div>
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
