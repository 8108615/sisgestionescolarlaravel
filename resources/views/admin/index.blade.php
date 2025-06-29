@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Bienvenido: {{ Auth::user()->roles->pluck('name')->implode(', ') }} - </b>{{ Auth::user()->name }}</h1>
    <hr>
@stop

@section('content')
<div class="row">

    @if (Auth::user()->roles->pluck('name')->implode(', ') == 'ESTUDIANTE')
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <b>Datos del Usuario</b>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <tr>
                            <th>Nombre</th>
                            <td>{{ Auth::user()->estudiante->nombres }}</td>
                        </tr>
                        <tr>
                            <th>Apellidos</th>
                            <td>{{ Auth::user()->estudiante->apellidos }}</td>
                        </tr>
                        <tr>
                            <th>Carnet de Identidad</th>
                            <td>{{ Auth::user()->estudiante->ci }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Nacimiento</th>
                            <td>{{ Auth::user()->estudiante->fecha_nacimiento }}</td>
                        </tr>
                        <tr>
                            <th>Telefono</th>
                            <td>{{ Auth::user()->estudiante->telefono }}</td>
                        </tr>
                        <tr>
                            <th>Direccion</th>
                            <td>{{ Auth::user()->estudiante->direccion }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
    @endif


    @if (Auth::user()->roles->pluck('name')->implode(', ') == 'DOCENTE')
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <b>Datos del Usuario</b>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <tr>
                            <th>Nombre</th>
                            <td>{{ Auth::user()->personal->nombres }}</td>
                        </tr>
                        <tr>
                            <th>Apellidos</th>
                            <td>{{ Auth::user()->personal->apellidos }}</td>
                        </tr>
                        <tr>
                            <th>Carnet de Identidad</th>
                            <td>{{ Auth::user()->personal->ci }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Nacimiento</th>
                            <td>{{ Auth::user()->personal->fecha_nacimiento }}</td>
                        </tr>
                        <tr>
                            <th>Telefono</th>
                            <td>{{ Auth::user()->personal->telefono }}</td>
                        </tr>
                        <tr>
                            <th>Profesion</th>
                            <td>{{ Auth::user()->personal->profesion }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
    @endif
</div>
    <div class="row">

        @can('admin.gestiones.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/colegio.gif') }}" width="70px" alt="">

                    <div class="info-box-content">
                        <span class="info-box-text"><b>Gestiones Registrados</b></span>
                        <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_gestiones }}
                            Gestiones</span>
                    </div>
                </div>
            </div>
        @endcan

        @can('admin.periodos.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/calendario.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Periodos Registrados</b></span>
                        <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_periodos }}
                            Periodos</span>
                    </div>
                </div>
            </div>
        @endcan

        @can('admin.niveles.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/lista.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Niveles Registrados</b></span>
                        <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_niveles }} Niveles</span>
                    </div>
                </div>
            </div>
        @endcan

        @can('admin.grados.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/cliente.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Grados Registrados</b></span>
                        <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_grados }} Grados</span>
                    </div>
                </div>
            </div>
        @endcan

        @can('admin.paralelos.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/velocidad.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Paralelos Registrados</b></span>
                        <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_paralelos }}
                            Paralelos</span>
                    </div>
                </div>
            </div>
        @endcan

        @can('admin.turnos.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/reloj.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Turnos Registrados</b></span>
                        <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_turnos }} Turnos</span>
                    </div>
                </div>
            </div>
        @endcan

        @can('admin.materias.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/libro.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Materias Registradas</b></span>
                        <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_materias }}
                            Materias</span>
                    </div>
                </div>
            </div>
        @endcan

        @can('admin.roles.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/roles.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Roles Registrados</b></span>
                        <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_roles }} Roles</span>
                    </div>
                </div>
            </div>
        @endcan

        @can('admin.personal.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/administrativos.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Administrativos Registrados</b></span>
                        <span class="info-box-number"
                            style="color: #1d20fa; font-size:15pt">{{ $total_personal_administrativo }} Administrativos</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/docente.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Docentes Registrados</b></span>
                        <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_personal_docente }}
                            Docentes</span>
                    </div>
                </div>
            </div>
        @endcan

        @can('admin.ppffs.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/empleados.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Padres de Familia Registrados</b></span>
                        <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_ppffs }} Padres de
                            Familia</span>
                    </div>
                </div>
            </div>
        @endcan

        @can('admin.estudiantes.index')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/estudiantes.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Estudiantes Registrados</b></span>
                        <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_estudiantes }}
                            Estudiantes</span>
                    </div>
                </div>
            </div>
        @endcan
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Total de Estudiantes Matriculados</h3>
                </div>
                <div class="card-body">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Total de Pagos por Mes</h3>
                </div>
                <div class="card-body">
                    <div>
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        var gestiones = @json($gestionesArray);
        var matriculados = @json($datosMatriculados);
        new Chart(document.getElementById('myChart'), {
            type: 'line',
            data: {
                labels: gestiones,
                datasets: [{
                    label: 'Total de Estudiantes Matriculados',
                    data: matriculados,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var meses = @json($meses);
        var montos = @json($montos);
        new Chart(document.getElementById('myChart2'), {
            type: 'bar',
            data: {
                labels: meses,
                datasets: [{
                    label: 'Total de Pagos por Mes',
                    data: montos,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@stop
