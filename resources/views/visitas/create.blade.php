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

                    <div class="card-header">Registrar Visita</div>

                    <div class="card-body">
                        <form action="{{ route('visitas.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="cedula">Cedula</label>
                                <input type="number" name="cedula" id="cedula" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="instituto">Instituto</label>
                                <input type="text" name="instituto" id="instituto" class="form-control" >
                            </div>


                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="instituto">Salida</label>
                                <input type="date" name="salida" id="salida" class="form-control" >
                            </div>

                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
