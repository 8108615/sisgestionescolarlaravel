@extends('adminlte::page')

@section('content_header')
    <h1><b>Pagos del Estudiante {{ $estudiante->apellidos . ' ' . $estudiante->nombres }}</b></h1>
    <hr>
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="accordion" id="accordionExample">
                @foreach ($matriculas as $matricula)
                    <div class="card">
                        <div class="card-header" style="background-color: #1df09f" id="heading{{ $matricula->id }}">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne{{ $matricula->id }}" aria-expanded="true"
                                    aria-controls="collapseOne{{ $matricula->id }}">
                                    <b>Natricula: Gestion
                                        {{ $matricula->gestion->nombre . ' - ' . $matricula->nivel->nombre . ' - ' . $matricula->grado->nombre . ' - ' . $matricula->paralelo->nombre }}</b>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne{{ $matricula->id }}" class="collapse show"
                            aria-labelledby="heading{{ $matricula->id }}" data-parent="#accordionExample">
                            <div class="card-body">
                                <b>Pagos Realizados</b>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success float-right" data-toggle="modal"
                                    data-target="#exampleModal{{ $matricula->id }}">
                                    <i class="fas fa-money-bill-wave"></i> Realizar Pago
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $matricula->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #211df0;color:#ffffff">
                                                <h5 class="modal-title" id="exampleModalLabel">Registrar Pago</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/pagos/create') }}" method="POST">
                                                    @csrf
                                                    <input type="text" value="{{ $matricula->id }}"
                                                        name="matriculacion_id" hidden>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Monto</label><b> (*)</b>
                                                                <input type="number" class="form-control" name="monto"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Metodo de Pago</label><b> (*)</b>
                                                                <select name="metodo_pago" class="form-control"
                                                                    id="" required>
                                                                    <option value="Efectivo">Efectivo</option>
                                                                    <option value="Transferencia">Transferencia</option>
                                                                    <option value="Tarjeta de credito">Tarjeta de credito
                                                                    </option>
                                                                    <option value="Tarjeta de debito">Tarjeta de debito
                                                                    </option>
                                                                    <option value="Cheque">Cheque</option>
                                                                    <option value="Otros">Otros</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Descripcion</label><b> (*)</b>
                                                                <textarea name="descripcion" class="form-control" id="" cols="30" rows="4" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Fecha de Pago</label><b> (*)</b>
                                                                <input type="date" class="form-control" name="fecha_pago"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <table class="table table-bordered table-striped table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th>Nro</th>
                                            <th>Monto</th>
                                            <th>Metodo de Pago</th>
                                            <th>Descripcion</th>
                                            <th>Fecha de Pago</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($matricula->pagos as $pago)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pago->monto }}</td>
                                                <td>{{ $pago->metodo_pago }}</td>
                                                <td>{{ $pago->descripcion }}</td>
                                                <td>{{ $pago->fecha_pago }}</td>
                                                <td>
                                                    @if ($pago->estado == 'Completado')
                                                        <span class="badge badge-success">{{ $pago->estado }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ $pago->estado }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-warning btn-sm"
                                                        href="{{ url('/admin/pagos/' . $pago->id . '/comprobante') }}">
                                                        <i class="fas fa-print"></i> Comprobante
                                                    </a>

                                                    <form action="{{ url('/admin/pagos/' . $pago->id) }}"
                                                        method="post" id="miFormulario{{ $pago->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="preguntar{{ $pago->id }}(event)">
                                                            <i class="fas fa-trash"></i> Eliminar Pago
                                                        </button>
                                                    </form>
                                                    <script>
                                                        function preguntar{{ $pago->id }}(event) {
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
                                                                    document.getElementById('miFormulario{{ $pago->id }}').submit();
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
                @endforeach

            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
