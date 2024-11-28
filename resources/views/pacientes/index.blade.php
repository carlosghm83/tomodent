@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Listado de Pacientes</h2>

    <!-- Botón para agregar nuevo paciente -->
    <div class="text-right mb-3">
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-person-plus-fill"></i> Agregar Nuevo Paciente
        </a>
    </div>

    <!-- Tabla de pacientes -->
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Celular</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->id }}</td>
                    <td>{{ $paciente->nombre }}</td>
                    <td>{{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d/m/Y') }}</td>
                    <td>{{ $paciente->celular }}</td>
                    <td>
                        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-fill"></i> Editar
                        </a>
                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este paciente?')">
                                <i class="bi bi-trash-fill"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $pacientes->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
@endsection
