@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Listado de Servicios</h2>

    <div class="text-right mb-3">
        <a href="{{ route('servicios.create') }}" class="btn btn-success">
            <i class="bi bi-plus-square"></i> Agregar Nuevo Servicio
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Cantidad de Placas</th>
                    <th>Precio</th>
                    <th>Puntos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servicios as $servicio)
                <tr>
                    <td>{{ $servicio->id }}</td>
                    <td>{{ $servicio->nombre }}</td>
                    <td>{{ $servicio->cantidad_placas }}</td>
                    <td>{{ $servicio->precio }}</td>
                    <td>{{ $servicio->puntos }}</td>
                    <td>
                        <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-fill"></i> Editar
                        </a>
                        <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este servicio?')">
                                <i class="bi bi-trash-fill"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
