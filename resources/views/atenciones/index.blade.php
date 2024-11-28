@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Atenciones</h1>
    <a href="{{ route('atenciones.create') }}" class="btn btn-primary mb-3">Agregar Nueva Atención</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Dentista</th>
                <th>Paciente</th>
                <th>Servicio</th>
                <th>Fecha</th>
                <th>Precio</th>
                <th>Puntos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($atenciones as $atencion)
                <tr>
                    <td>{{ $atencion->id }}</td>
                    <td>{{ $atencion->dentista->nombre }}</td>
                    <td>{{ $atencion->paciente->nombre }}</td>
                    <td>{{ $atencion->servicio->nombre }}</td>
                    <td>{{ $atencion->fecha }}</td>
                    <td>{{ $atencion->precio }}</td>
                    <td>{{ $atencion->puntos }}</td>
                    <td>
                        <!-- Botón de editar -->
                        <a href="{{ route('atenciones.edit', $atencion->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Editar
                        </a>
                        
                        <!-- Botón de eliminar -->
                        <form action="{{ route('atenciones.destroy', $atencion->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta atención?')">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    {{ $atenciones->links() }}
</div>
@endsection
