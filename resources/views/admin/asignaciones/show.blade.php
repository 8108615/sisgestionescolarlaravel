@extends('adminlte::page')

@section('content_header')
    <h1><b>Asignaciones/Datos de la Asignacion de Materias del Docente</b></h1>
    <hr>
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos del Docente</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="datos_estudiante">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Fotografia</label>
                                                    <center>
                                                        <img src="{{ url($asignacion->personal->foto) }}" width="50%" id="foto" alt="">
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Apellidos</label>
                                                    <p id="apellidos">{{ $asignacion->personal->apellidos }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Nombres</label>
                                                    <p id="nombres">{{ $asignacion->personal->nombres }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Carnet de Identidad</label>
                                                    <p id="ci">{{ $asignacion->personal->ci }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Fecha de Nacimiento</label>
                                                    <p id="fecha_nacimiento">{{ $asignacion->personal->fecha_nacimiento }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Telefono</label>
                                                    <p id="telefono">{{ $asignacion->personal->telefono }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Direccion</label>
                                                    <p id="direccion">{{ $asignacion->personal->direccion }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Correo Electronico</label>
                                                    <p id="email">{{ $asignacion->personal->usuario->email }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Genero</label>
                                                    <p id="profesion">{{ $asignacion->personal->profesion }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Formacion Academica</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr><th>Titulo</th><th>Institucion</th><th>Nivel</th><th>Fecha Graduacion</th><th>Archivo</th></tr>
                                </thead>
                                <tbody>
                                    @foreach ($asignacion->personal->formaciones as $datos )
                                        <tr>
                                            <td>{{ $datos->titulo }}</td>
                                            <td>{{ $datos->institucion }}</td>
                                            <td>{{ $datos->nivel }}</td>
                                            <td>{{ $datos->fecha_graduacion }}</td>
                                            <td>
                                                <a href="{{ url($datos->archivo) }}" target="_blank">Ver Archivo</a>
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
        </div>
        <div class="col-md-4">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos Registrados de la Asignacion</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Turnos</label>
                                    <p>{{ $asignacion->turno->nombre }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gestiones</label>
                                    <p>{{ $asignacion->gestion->nombre }}</p>
                                    @error('gestion_id')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Niveles</label>
                                    <p>{{ $asignacion->nivel->nombre }}</p>
                                    @error('nivel_id')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Grado</label>
                                    <p>{{ $asignacion->grado->nombre }}</p>
                                    @error('grado_id')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Paralelo</label>
                                    <p>{{ $asignacion->paralelo->nombre }}</p>
                                    @error('paralelo_id')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha</label>
                                    <p>{{ $asignacion->fecha_asignacion}}</p>
                                    @error('fecha_id')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Materia a Impartir</label><b> (*)</b>
                                    <p>{{ $asignacion->materia->nombre}}</p>
                                    @error('materia_id')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/asignaciones') }}" class="btn btn-default">
                                        <i class="fas fa-arrow-left"></i>Volver</a>
                                </div>
                            </div>
                        </div>
                    


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


    </div>
@stop

@section('css')
    <style>
        .select2-container .select2-selection--single {
            height: 40px !important;
        }
    </style>
@stop

@section('js')
    <script>
        $('.select2').select2({});

        $('#niveles').on('change', function() {
            var id = $(this).val();
            if (id) {
                $.ajax({
                    url: "{{ url('/admin/matriculaciones/buscar_grado/') }}" + '/' + id,
                    type: 'GET',
                    success: function(grados) {
                        var options = '<option value="">Seleccion un Grado...</option>';
                        $.each(grados, function(key, value) {
                            options += '<option value="' + key + '">' + value + '</option>';
                        });
                        $('#grados').html(options);
                    },
                    error: function() {
                        alert('No se Puede Obtener Informacion del Nivel');
                    }
                });
            } else {
                alert('Seleccione un Nivel...');
            }
        });

        $('#grados').on('change', function() {
            var id = $(this).val();
            if (id) {
                $.ajax({
                    url: "{{ url('/admin/matriculaciones/buscar_paralelo/') }}" + '/' + id,
                    type: 'GET',
                    success: function(paralelos) {
                        var options = '<option value="">Seleccion un Paralelo...</option>';
                        $.each(paralelos, function(key, value) {
                            options += '<option value="' + key + '">' + value + '</option>';
                        });
                        $('#paralelos').html(options);
                    },
                    error: function() {
                        alert('No se Puede Obtener Informacion del Grado');
                    }
                });
            } else {
                alert('Seleccione un Grado...');
            }
        });

        $('#buscar_estudiante').on('change', function() {
            var id = $(this).val();

            if (id) {
                $.ajax({
                    url: "{{ url('/admin/matriculaciones/buscar_estudiante/') }}" + '/' + id,
                    type: 'GET',
                    success: function(estudiante) {
                        $('#apellidos').html(estudiante.apellidos);
                        $('#nombres').html(estudiante.nombres);
                        $('#ci').html(estudiante.ci);
                        $('#fecha_nacimiento').html(estudiante.fecha_nacimiento);
                        $('#telefono').html(estudiante.telefono);
                        $('#direccion').html(estudiante.direccion);
                        $('#email').html(estudiante.usuario.email);
                        $('#genero').html(estudiante.genero);
                        $('#foto').attr('src', estudiante.foto_url).show();
                        $('#estudiante_id').val(estudiante.id);
                        $('#datos_estudiante').css('display', 'block');



                        if (estudiante.matriculaciones && estudiante.matriculaciones.length > 0) {
                            var tabla = '<table class="table table-bordered"';
                            tabla +=
                                '<thead><tr><th>Turno</th><th>Gestion</th><th>Nivel</th><th>Grado</th><th>Paralelo</th></tr></thead>';
                            tabla += '<tbody>';
                            estudiante.matriculaciones.forEach(function(matriculacion) {
                                tabla += '<tr>';
                                tabla += '<td>' + matriculacion.turno.nombre + '</td>';
                                tabla += '<td>' + matriculacion.gestion.nombre + '</td>';
                                tabla += '<td>' + matriculacion.nivel.nombre + '</td>';
                                tabla += '<td>' + matriculacion.grado.nombre + '</td>';
                                tabla += '<td>' + matriculacion.paralelo.nombre + '</td>';
                                tabla += '</tr>';
                            });
                            $('#tabla_historial').html(tabla).show();
                        } else {
                            $('#tabla_historial').html(
                                '<p>No Hay Historia Academico Registrado del Estudiante.</p>');
                        }
                    },
                    error: function() {
                        alert('No se Puede Obtener Informacion del Estudiante');
                    }
                });
            }
        });
    </script>
@stop
