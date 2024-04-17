@extends('layouts.admin')
@section('content')
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalles del Usuario</div>

                <div class="card-body">
        <div class="form-group">
            <strong>Nombre:</strong>
            {{ $user->name }}
        </div>

        <div class="form-group">
            <strong>Correo Electronico:</strong>
            {{ $user->email }}
        </div>


        <div class="form-group">
            <strong>Rol:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                @endforeach
            @endif
        </div>
        

</div>
@endsection
