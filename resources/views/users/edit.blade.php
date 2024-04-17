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
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Actualizar Usuario</div>
            <div class="card-body">
                {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
                <div class="form-group">
                    <strong>Nombre:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Nombre', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Correo Electrónico:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'Correo Electrónico', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Contraseña:</strong>
                    {!! Form::password('password', array('placeholder' => 'Contraseña', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Confirmar Contraseña:</strong>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirmar Contraseña', 'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Rol:</strong>
                    {!! Form::select('roles[]', $roles, $userRole, array('class' => 'form-control', 'multiple')) !!}
                </div>
             
                <button type="submit" class="btn btn-primary">Actualizar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
