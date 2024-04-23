@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-9">
            <div class="pull-left">
                <h2>Tabla De Control de Entrada y Salida de Visitantes</h2>
            </div>
        </div>
    </div>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ route('controles.index') }}">
        @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="cedula" class="form-label">Cédula:</label>
                <input type="text" class="form-control" id="cedula" name="cedula" value="{{ $cedula }}" placeholder="Ingrese la cédula" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $fechaInicio }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="fecha_fin" class="form-label">Fecha de fin:</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ $fechaFin }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-success" name="action" value="search"  id="button-addon2" type="submit"><i class='fas fa-search'></i></button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-warning" name="action" value="pdf"  id="button-addon2" type="submit"><i class='fas fa-file'></i></button>
            </div>
        </div>
    </form>
    @if (Session::get('success'))
    <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert"">
        <strong>{{Session::get('success')}}</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!-- Tabla de visitas -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>Nombre de Visita</th>
                <th>Cédula</th>
                <th>Hora de Entrada</th>
                <th>Hora de Salida</th>
                <th>Fecha de Registro</th>
                <th width="280px">Acciones</th>
            </tr>
            @foreach ($controles as $control)
            <tr>
                <td>{{ $control->visita->nombre }} {{ $control->visita->apellido }}</td>
                <td>{{ $control->visita->cedula }}</td>
                <td>{{ $control->hora_entrada }}</td>
                <td>{{ $control->hora_salida }}</td>
                <td>{{ $control->created_at }}</td>
                <td>
                  @can('horas-edit')

                  <!-- Acciones -->
                    <a href="{{ route('controles.edit', $control->id) }}" class="btn btn-primary "><i class='fas fa-pen'></i></a>
                     @endcan


                     @can('horas-delete')


                    <form method="POST" action="{{ route('controles.destroy', $control->id) }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class='fas fa-trash-alt'></i>
                        </button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <!-- Paginación -->
    {!! $controles->render() !!}
@endsection
