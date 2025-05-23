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
                    <span class="info-box-number">{{ $total_periodos }} Periodos</span>
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
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop