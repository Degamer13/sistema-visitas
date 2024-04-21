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

                    <div class="card-header">Registrar Entrada y Salida de Visitante</div>

                    <div class="card-body">
                        <form action="{{ route('controles.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nombre">Hora de Entrada</label>
                                <input type="time" name="nombre" id="nombre" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="apellido">Hora de Salida</label>
                                <input type="time" name="apellido" id="apellido" class="form-control" >
                            </div>


                            <div class="form-group">
                            <label for="opciones">Opciones:</label>
  <select id="opciones" name="opciones" class="form-select">
    <option value="opcion1">Habla claro menor XD PROBANDO EN MI PC</option>
    <option value="opcion2">Opción 2</option>
    <option value="opcion3">Opción 3</option>
  </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


