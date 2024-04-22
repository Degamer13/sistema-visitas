@extends('layouts.admin')
@section('content')
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Roles</h2>
        </div>

    </div>
</div>
@if (Session::get('success'))
    <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
        <strong>{{Session::get('success')}}</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="col-6">

        <form class="">

            <div class="input-group mb-3" >
        <input type="text" class="form-control"   name="buscarpor" value="{{$buscarpor}}"   type="search" placeholder="Buscar" aria-label="Search" aria-describedby="button-addon2" required>
        <div class="input-group-append">
          <button class="btn btn-success"  id="button-addon2" type="submit"><i class='fas fa-search'></i></button>
        </div>
      </div>
        </form>


</div>
    <div class="table-responsive">
<table class="table table-bordered">
    <tr>

        <th>Nombre</th>
        <th width="280px">Acciones</th>
    </tr>

    @foreach ($roles as $key => $role)
    <tr>

        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}"><i class='fas fa-eye'></i></a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i class='fas fa-pen'></i></a>
            @endcan
            @can('role-delete')
            <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline">
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
{!! $roles->render() !!}

@endsection
