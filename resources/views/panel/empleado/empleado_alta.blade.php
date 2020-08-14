@extends('panel.plantilla_admin')

@section('section_admin')

<!-- ruta  -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-bullet">
    <li class="breadcrumb-item"><a href="{{ route('principal')}}" class="text-uppercase">Panel</a></li>
    <li class="breadcrumb-item"><a href="{{ route('empleado')}}" class="text-uppercase">Empleados</a></li>
    <li aria-current="page" class="breadcrumb-item active text-uppercase">Alta</li>
  </ol>
</nav>

<!-- formulario -->
<div class="card shadow rounded">
  <div class="card-header clearfix">
    <div class="card-title">Formulario Empleado</div>
  </div>
  <div class="card-body">
    <form action="{{ route('altaEmpleado') }}" method="POST">
      @csrf

      @error('nombre')
      <div class="alert alert-danger" role="alert">
        el nombre es obligatorio.
      </div>
      @enderror

      @error('apellido')
      <div class="alert alert-danger" role="alert">
        el apellido es obligatorio.
      </div>
      @enderror

      @error('direccion')
      <div class="alert alert-danger" role="alert">
        la direccion es obligatoria.
      </div>
      @enderror

      @error('fingreso')
      <div class="alert alert-danger" role="alert">
        la fecha de ingreso es obligatoria.
      </div>
      @enderror

      @error('observaciones')
      <div class="alert alert-danger" role="alert">
        agrega una observacion.
      </div>
      @enderror

      <label for="nombre">nombre</label>
      <input type="text" name="nombre" placeholder="nombre" class="form-control mb-2">

      <label for="apellido">apellido</label>
      <input type="text" name="apellido" placeholder="apellido" class="form-control mb-2">

      <label for="mail">direccion</label>
      <input type="text" name="direccion" placeholder="direccion" class="form-control mb-2">

      <label for="fecha ingreso">fecha ingreso</label>
      <input type="text" name="fingreso" placeholder="fecha ingreso" class="form-control mb-2">

      <label for="observaciones">observaciones</label>
      <input type="text" name="observaciones" placeholder="observaciones" class="form-control mb-2">

      <button type="submit" class="btn btn-success mt-3">agregar empleado</button>
    </form>
  </div>
</div>

@endsection
