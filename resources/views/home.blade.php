@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mt-4">Sistema de Visitas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Contadores</li>
    </ol>

    <div class="row justify-content-center">

        <div class="col-md-12 my-4">
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Bienvenido {{ Auth::user()->name }}!</strong>  @if (session('status'))
  <div class="alert alert-success" role="alert">
      {{ session('status') }}
  </div>
@endif

{{ __('You are logged in!') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="row">
    @php
    use App\Models\User;
   $cant_usuarios = User::count();
   @endphp
      @can('user-list')
    <div class="col-sm-4 mb-3 mb-sm-0">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body"><h4>Usuarios</h4>
                <p>Hay {{ $cant_usuarios}} usuarios registrados.</p></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="/users">Visualizar</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    @endcan


    <div class="col-sm-4">
        @php
        use Spatie\Permission\Models\Role;
         $cant_roles = Role::count();
        @endphp

 @can('role-list')
        <div class="card bg-danger text-white mb-4">
            <div class="card-body"><h4>Roles</h4>
                <p>Hay {{ $cant_roles}} roles registrados.</p></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="/roles">Visualizar</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    @endcan

    <div class="col-sm-4">
        @php
    use App\Models\Visita;
   $cant_visitas = Visita::count();
   @endphp
@can('visita-list')



        <div class="card bg-success text-white mb-4">
            <div class="card-body"><h4>Visitas</h4>
                <p>Hay {{ $cant_visitas}} visitas registradas.</p></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="/visitas">Visualizar</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
        @endcan

    </div>

</div>

        </div>
    </div>
</div>
@endsection
