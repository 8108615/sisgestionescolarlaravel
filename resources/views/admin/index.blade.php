@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Bienvenido: </b>{{ Auth::user()->name }}</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/colegio.gif') }}" width="70px" alt="">

                <div class="info-box-content">
                    <span class="info-box-text"><b>Gestiones Registrados</b></span>
                    <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_gestiones }} Gestiones</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/calendario.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Periodos Registrados</b></span>
                    <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_periodos }} Periodos</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/lista.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Niveles Registrados</b></span>
                    <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_niveles }} Niveles</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/cliente.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Grados Registrados</b></span>
                    <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_grados }} Grados</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/velocidad.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Paralelos Registrados</b></span>
                    <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_paralelos }} Paralelos</span>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/reloj.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Turnos Registrados</b></span>
                    <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_turnos }} Turnos</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/libro.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Materias Registradas</b></span>
                    <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_materias }} Materias</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/roles.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Roles Registrados</b></span>
                    <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_roles }} Roles</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/administrativos.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Administrativos Registrados</b></span>
                    <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_personal_administrativo }} Administrativos</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/docente.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Docentes Registrados</b></span>
                    <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_personal_docente }} Docentes</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/empleados.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Padres de Familia Registrados</b></span>
                    <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_ppffs }} Padres de Familia</span>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ url('/img/estudiantes.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Estudiantes Registrados</b></span>
                    <span class="info-box-number" style="color: #1d20fa; font-size:15pt">{{ $total_estudiantes }} Estudiantes</span>
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
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop