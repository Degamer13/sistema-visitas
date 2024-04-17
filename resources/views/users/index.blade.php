@extends('layouts.admin')
@section('content')
<br>
<div class="row">
    <div class="col-lg-9">
        <div class="pull-left">
            <h2>Usuarios</h2>
        </div>

    </div>
</div>
@if (Session::get('success'))
    <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert"">
        <strong>{{Session::get('success')}}</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="col-6">

        <form class="">

            <div class="input-group mb-3" >
        <input type="text" class="form-control"   name="buscarpor" value="{{$buscarpor}}"   type="search" placeholder="Buscar" aria-label="Search" aria-describedby="button-addon2">
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
        <th>Correo Electronico</th>
        <th>Roles</th>

        <th width="280px">Acciones</th>
    </tr>
@foreach ($data as $key => $user)
    <tr>

        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                @endforeach
            @endif
        </td>

        <td>
            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}"><i class='fas fa-eye'></i></a>
          @can('user-edit')


            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"><i class='fas fa-pen'></i></a>
            @endcan
            @can('user-delete')


            <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class='fas fa-trash-alt'></i>
                </button>
            </form>  @endcan
        </td>
    </tr>
@endforeach
</table>
</div>
{!! $data->render() !!}

@endsection
