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
                <input type="text" class="form-control" id="cedula" name="cedula" value="{{ $cedula }}" placeholder="Ingrese la cédula">
            </div>
            <div class="col-md-4 mb-3">
                <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $fechaInicio }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="fecha_fin" class="form-label">Fecha de fin:</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ $fechaFin }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>

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
                    <!-- Acciones -->
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <!-- Paginación -->
    {!! $controles->render() !!}
@endsection
