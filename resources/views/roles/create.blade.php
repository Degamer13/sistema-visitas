@extends('layouts.admin')
@section('content')
<br>
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

{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Registrar Rol</div>
            <div class="card-body">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Permisos:</strong>
                    {{ Form::select('permissions[]', $permissions, null, ['multiple'=>'multiple', 'class'=>'form-control select2']) }}
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

@endsection
