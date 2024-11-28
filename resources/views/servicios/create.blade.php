@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Servicio</h1>
    <form action="{{ route('servicios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cantidad_placas">Cantidad de Placas</label>
            <input type="number" name="cantidad_placas" id="cantidad_placas" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="puntos">Puntos</label>
            <input type="number" name="puntos" id="puntos" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Servicio</button>
    </form>
</div>
@endsection
