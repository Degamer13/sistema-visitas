@extends('layouts.admin')

@section('content')
<br>
<div class="container">
    @if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Entrada y Salida de Visitante</div>
                <div class="card-body">
                    <form action="{{ route('controles.update', $control->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre">Hora de Entrada</label>
                            <input type="time" name="hora_entrada" id="nombre" class="form-control" value="{{ $control->hora_entrada }}">
                        </div>

                        <div class="form-group">
                            <label for="apellido">Hora de Salida</label>
                            <input type="time" name="hora_salida" id="apellido" class="form-control" value="{{ $control->hora_salida }}">
                        </div>

                        <div class="form-group">
                            <label for="opciones">Seleccione la Cedula:</label>
                            <select id="opciones" name="id_visita" class="form-select">
                                @foreach ($controles as $controlOption)
                                <option value="{{ $controlOption->id }}" {{ $control->id_visita == $controlOption->id ? 'selected' : '' }}>
                                    {{ $controlOption->nombre }} {{ $controlOption->apellido }} {{ $controlOption->cedula }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
