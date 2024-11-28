@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Servicio</h1>
    <form action="{{ route('servicios.update', $servicio->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $servicio->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="cantidad_placas">Cantidad de Placas</label>
            <input type="number" name="cantidad_placas" id="cantidad_placas" class="form-control" value="{{ old('cantidad_placas', $servicio->cantidad_placas) }}" required>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control" value="{{ old('precio', $servicio->precio) }}" required>
        </div>

        <div class="form-group">
            <label for="puntos">Puntos</label>
            <input type="number" name="puntos" id="puntos" class="form-control" value="{{ old('puntos', $servicio->puntos) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Servicio</button>
    </form>
</div>
@endsection
