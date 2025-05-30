@extends('adminlte::page')

@section('content_header')
    <h1><b>Creacion de un Nuevo Estudiante </b></h1>
    <hr>
@stop

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title"><b>Llene los Datos del Padre de Familia en el Formulario</b></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalCreate">
                            <i class="fas fa-search"></i> Buscar Padre de Familia</button>
                        <!-- Modal -->
                        <div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Padres de Familia</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="example1"
                                            class="table table-bordered table-striped table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Nro</th>
                                                    <th style="text-align: center">Apellidos y Nombres</th>
                                                    <th style="text-align: center">Carnet de Identidads</th>
                                                    <th style="text-align: center">Fecha de Nacimiento</th>
                                                    <th style="text-align: center">Telefono</th>
                                                    <th style="text-align: center">Parentesco</th>
                                                    <th style="text-align: center">Ocupacion</th>
                                                    <th style="text-align: center">Direccion</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ppffs as $ppff)
                                                    <tr>
                                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                                        <td>{{ $ppff->apellidos }} {{ $ppff->nombres }}</td>
                                                        <td>{{ $ppff->ci }}</td>
                                                        <td>{{ $ppff->fecha_nacimiento }}</td>
                                                        <td>{{ $ppff->telefono }}</td>
                                                        <td>{{ $ppff->parentesco }}</td>
                                                        <td>{{ $ppff->ocupacion }}</td>
                                                        <td>{{ $ppff->direccion }}</td>
                                                        <td>
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>




    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los Datos del Estudiante en el Formulario</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('/admin/estudiantes/create') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Fotografia</label><b> (*)</b>


                                    <input type="file" class="form-control" name="foto" placeholder="Escriba aquí..."
                                        onchange="mostrarImagen(event)" accept="image/*" required>
                                    <br>

                                    <center>
                                        <img id="preview" src="" style="max-width: 200px; margin-top: 10px;">
                                    </center>


                                    @error('foto')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <script>
                                    const mostrarImagen = e =>
                                        document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                </script>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombre del Rol</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                </div>
                                                <select name="rol" id="" class="form-control">
                                                    <option value="">Seleccion un Rol</option>

                                                </select>
                                            </div>
                                            @error('rol')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user-check"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="nombres" id="nombres"
                                                    value="{{ old('nombres') }}" placeholder="Ingrese el Nombre..."
                                                    required>
                                            </div>
                                            @error('nombres')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user-friends"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="apellidos"
                                                    id="apellidos" value="{{ old('apellidos') }}"
                                                    placeholder="Ingrese el Apellidos..." required>
                                            </div>
                                            @error('apellidos')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Cedula de Identidad</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-id-card"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="ci" id="ci"
                                                    value="{{ old('ci') }}" placeholder="Ingrese el CI..." required>
                                            </div>
                                            @error('ci')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de Nacimiento</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="date" class="form-control" name="fecha_nacimiento"
                                                    id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                                            </div>
                                            @error('fecha_nacimiento')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Telefono</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="telefono"
                                                    id="telefono" value="{{ old('telefono') }}"
                                                    placeholder="Ingrese el Telefono..." required>
                                            </div>
                                            @error('telefono')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Profesion</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-briefcase"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="profesion"
                                                    id="profesion" value="{{ old('profesion') }}"
                                                    placeholder="Ingrese la Profesion..." required>
                                            </div>
                                            @error('profesion')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Correo Electronico</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    value="{{ old('email') }}"
                                                    placeholder="Ingrese el Correo Electronico..." required>
                                            </div>
                                            @error('email')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Direccion</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="direccion"
                                                    id="direccion" value="{{ old('direccion') }}"
                                                    placeholder="Ingrese la Direccion..." required>
                                            </div>
                                            @error('direccion')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/roles') }}" class="btn btn-default">
                                        <i class="fas fa-arrow-left"></i>Cancelar</a>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                        Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
