@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3>Lista de Dentistas</h3>
                    </div>
                    <div class="card-body">
                        <!-- Botón para crear un nuevo dentista -->
                        <a href="{{ route('dentistas.create') }}" class="btn btn-success mb-3">Agregar Dentista</a>

                        <!-- Tabla de dentistas -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Consultorio</th>
                                    <th>Celular</th>
                                    <th>Correo Electrónico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dentistas as $dentista)
                                    <tr>
                                        <td>{{ $dentista->nombre }}</td>                                        
                                        <td>{{ $dentista->consultorio }}</td>
                                        <td>{{ $dentista->celular }}</td>
                                        <td>{{ $dentista->email }}</td>
                                        <td>
                                            <a href="{{ route('dentistas.edit', $dentista->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('dentistas.destroy', $dentista->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este dentista?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Paginación -->
                        <div class="d-flex justify-content-center">
                            {{ $dentistas->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
