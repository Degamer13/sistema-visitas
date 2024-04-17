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

<form method="POST" action="{{ route('roles.update', $role->id) }}">
    @method('PUT')
    @csrf

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Rol</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}">
                    </div>
                    <div class="form-group">
                        <label for="permissions">Permisos:</label>
                        <select name="permissions[]" id="permissions" class="form-control" multiple>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}"
                                    {{ in_array($permission->id, $rolePermissions) ? 'selected' : '' }}>
                                    {{ $permission->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
