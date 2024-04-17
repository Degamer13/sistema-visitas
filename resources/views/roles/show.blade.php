@extends('layouts.admin')
@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalles del Rol</div>

                <div class="card-body">
        <div class="form-group">
            <strong>Nombre:</strong>
            {{ $role->name }}
        </div>
    
 
        <div class="form-group">
            <strong>Permisos:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                @endforeach
            @endif
        </div>

</div>
@endsection