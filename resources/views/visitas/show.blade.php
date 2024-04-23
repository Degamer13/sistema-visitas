
@extends('layouts.admin')

@section('content')
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles de la Visita</div>

                    <div class="card-body">
                        <p><strong>Nombre:</strong> {{ $visita->nombre }}</p>
                        <p><strong>Apellido:</strong> {{ $visita->apellido }}</p>
                        <p><strong>Cedula:</strong> {{ $visita->cedula }}</p>
                        <p><strong>Instituto:</strong> {{ $visita->instituto }}</p>
                        <p><strong>Descripción:</strong> {{ $visita->descripcion }}</p>
                        <p><strong>Fecha de Registro:</strong> {{ $visita->created_at }}</p>
                        <p><strong>Fecha de Actualización:</strong> {{ $visita->updated_at }}</p>
                        <p><strong>Salida De Institución:</strong> {{ $visita->salida }}</p>


                        @if ($salidaHoy)
                        <p style="color: red;"><strong>El visitante ha culminado su visita</strong></p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
