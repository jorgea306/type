@extends('panel.plantilla_admin')

@section('section_admin')

<!-- ruta  -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-bullet">
        <li class="breadcrumb-item"><a href="{{ route('principal')}}" class="text-uppercase">Panel</a></li>
        <li class="breadcrumb-item"><a href="{{ route('mpplanillaingresoegresos')}}" class="text-uppercase">Planilla Ingreso, Egreso</a></li>
        <li aria-current="page" class="breadcrumb-item active text-uppercase">Editar</li>
    </ol>
</nav>

<!-- formulario -->
<div class="card shadow rounded">
    <div class="card-header clearfix">
        <div class="card-title">Formulario Planilla de Ingresos/Egresos</div>
    </div>
    <div class="card-body">
        <form action="{{ route('updatempplanillaingresoegresos', $planillas->id) }}" method="POST">
            @method('PUT')
            @csrf

            @error('fecha')
            <div class="alert alert-danger" role="alert">
                la fecha es obligatorio.
            </div>
            @enderror

            @error('observacion')
            <div class="alert alert-danger" role="alert">
                la observacion es obligatorio.
            </div>
            @enderror

            <label for="fecha">Fecha</label>
            <input value="{{ $planillas->fecha }}" type="text" name="fecha"
                placeholder="ingrese la fecha.." class="form-control mb-2">

            <label value="{{ $planillas->observacion }}" for="observacion">Observacion</label>
            <input type="text" name="observacion" placeholder="ingrese la observacion.." class="form-control mb-2">

            <div class="form-group">
                <label for="mpplanillaingresoegreso">seleccione un tipo de movimiento</label>
                <select class="form-control" id="tipomovimiento_id" name="tipomovimiento_id">
                    @foreach ($tipomovimientos as $item)
                    <option value="{{$item->id}}"> {{$item->nombre}} </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="mpplanillaingresoegreso">seleccionar un empleado</label>
                <select class="form-control" id="" name="empleado_id" name="empleado_id">
                    @foreach ($empleados as $item)
                    <option value="{{$item->id}}"> {{$item->nombre}} </option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-warning text-white">guardar cambios</button>
        </form>
    </div>
</div>

@endsection
