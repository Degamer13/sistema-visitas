@extends('layouts.admin')
@section('content')
    <br>
    <div class="row">
        <div class="col-lg-9">
            <div class="pull-left">
                <h2>Tabla de Registro de Visitas</h2>
            </div>

        </div>
    </div>
    @if (Session::get('success'))
        <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert"">
            <strong>{{ Session::get('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-6">

        <form method="GET" action="{{ route('visitas.index') }}">

            <div class="input-group mb-3">
                <input type="text" class="form-control" name="buscarpor" value="{{ $buscarpor }}" type="search"
                    placeholder="Buscar" aria-label="Search" aria-describedby="button-addon2" >
                <div class="input-group-append">
                    <button class="btn btn-success" id="button-addon2" name="action" value="submit" type="submit"><i class='fas fa-search'></i></button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-warning" name="action" value="pdf"  id="button-addon2" type="submit"><i class='fas
                         fa-file'></i></button>
                </div>
            </div>
        </form>

    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cedula</th>
                <th>Instituto</th>
                <th>Descripción</th>
                <th>Fecha de Registro</th>
                <th>Fecha de Actualización</th>
                <th>Salida de Institución</th>
                <th width="280px">Acciones</th>
            </tr>
            @foreach ($visitas as $visita)
                <tr>
                    <td>{{ $visita->nombre }}</td>
                    <td>{{ $visita->apellido }}</td>
                    <td>{{ $visita->cedula }}</td>
                    <td>{{ $visita->instituto }}</td>
                    <td>{{ $visita->descripcion }}</td>
                    <td>{{ $visita->created_at }}</td>
                    <td>{{ $visita->updated_at }}</td>
                    <td>{{ $visita->salida }}</td>
                    <td>
                        <a href="{{ route('visitas.show', $visita->id) }}" class="btn btn-info "><i
                                class='fas fa-eye'></i></a>
                        @can('visita-edit')
                            <a href="{{ route('visitas.edit', $visita->id) }}" class="btn btn-primary "><i
                                    class='fas fa-pen'></i></a>
                        @endcan


                        @can('visita-delete')
                            <form method="POST" action="{{ route('visitas.destroy', $visita->id) }}" style="display:inline">
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
    {!! $visitas->render() !!}
@endsection
