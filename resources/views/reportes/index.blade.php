@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center text-primary">Reporte de Atenciones</h1>

    <!-- Filtro de búsqueda -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <h5>Filtros de Búsqueda</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('reportes.index') }}">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="dentista_id">Dentista</label>
                            <select class="form-control" name="dentista_id" id="dentista_id">
                                <option value="">Todos</option>
                                @foreach($dentistas as $dentista)
                                    <option value="{{ $dentista->id }}" {{ request('dentista_id') == $dentista->id ? 'selected' : '' }}>
                                        {{ $dentista->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="paciente_id">Paciente</label>
                            <select class="form-control" name="paciente_id" id="paciente_id">
                                <option value="">Todos</option>
                                @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}" {{ request('paciente_id') == $paciente->id ? 'selected' : '' }}>
                                        {{ $paciente->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="servicio_id">Servicio</label>
                            <select class="form-control" name="servicio_id" id="servicio_id">
                                <option value="">Todos</option>
                                @foreach($servicios as $servicio)
                                    <option value="{{ $servicio->id }}" {{ request('servicio_id') == $servicio->id ? 'selected' : '' }}>
                                        {{ $servicio->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="fecha_inicio">Fecha Inicio</label>
                            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{ request('fecha_inicio') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="fecha_fin">Fecha Fin</label>
                            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="{{ request('fecha_fin') }}">
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Reporte de Atenciones -->
    <div class="card">
        <div class="card-header bg-success text-white">
            <h5>Lista de Atenciones</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Paciente</th>
                        <th>Dentista</th>
                        <th>Servicio</th>
                        <th>Fecha</th>
                        <th>Precio</th>
                        <th>Puntos</th>
                        <th>Cantidad de Placas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($atenciones as $atencion)
                        <tr>
                            <td>{{ $atencion->paciente->nombre }}</td>
                            <td>{{ $atencion->dentista->nombre }}</td>
                            <td>{{ $atencion->servicio->nombre }}</td>
                            <td>{{ $atencion->fecha }}</td>
                            <td>{{ number_format($atencion->precio, 2) }} soles</td>
                            <td>{{ $atencion->puntos }}</td>
                            
                            <td>{{ $atencion->servicio->cantidad_placas }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Totales -->
    <div class="card mt-4">
        <div class="card-header bg-warning text-white">
            <h5>Totales</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item"><strong>Total Placas:</strong> {{ $total_placas }}</li>
                <li class="list-group-item"><strong>Total Precio:</strong> {{ number_format($total_precio, 2) }} soles</li>
                <li class="list-group-item"><strong>Total Puntos:</strong> {{ $total_puntos }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
