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
                    <div class="card-header">Actualizar Visita</div>

                    <div class="card-body">
                        <form action="{{ route('visitas.update', $visita->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $visita->nombre }}">
                            </div>

                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $visita->apellido }}" >
                            </div>
                            <div class="form-group">
                                <label for="apellido">Cedula</label>
                                <input type="number" name="cedula" id="cedula" class="form-control" value="{{ $visita->cedula }}" >
                            </div>


                            <div class="form-group">
                                <label for="instituto">Instituto</label>
                                <input type="text" name="instituto" id="instituto" class="form-control" value="{{ $visita->instituto }}" >
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control">{{ $visita->descripcion }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="cantidad">Salida de Institución</label>
                                <input type="date" name="salida" id="salida" class="form-control" value="{{ $visita->salida }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
