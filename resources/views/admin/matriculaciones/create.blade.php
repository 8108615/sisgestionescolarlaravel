@extends('adminlte::page')

@section('content_header')
    <h1><b>Matriculaciones/Registro de una Nueva Matriculacion del Estudiante</b></h1>
    <hr>
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos del Estudiante</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Buscar Estudiante</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                        </div>
                                        <select name="" id="buscar_estudiante" class="form-control select2">
                                            <option value="">Selecciona un Estudiante...</option>
                                            @foreach ($estudiantes as $estudiante )
                                                <option value="{{ $estudiante->id }}">
                                                    {{ $estudiante->apellidos." ".$estudiante->nombres." - ".$estudiante->ci }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('nombre')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los Datos del Formulario</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-university"></i></span>
                                        </div>
                                        <input type="number" class="form-control"
                                            value="{{ old('nombre')}}" name="nombre"
                                            placeholder="Escriba aquí..." required>
                                    </div>
                                    @error('nombre')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')
    <style>
        .select2-container .select2-selection--single{
            height: 40px !important;
        }
    </style>
@stop

@section('js')
    <script>
        $('.select2').select2({});

        $('#buscar_estudiante').on('change',function(){
            var id = $(this).val();
            
            if(id){
                $.ajax({
                    url: "{{ url('/admin/matriculaciones/buscar_estudiante/') }}" +'/' +id,
                    type: 'GET',
                    success: function{}
                    success: function(estudiante){

                    },error:function(){
                        alert('No se Puede Obtener Informacion del Estudiante');
                    }
                });
            }
        });
    </script>
@stop
