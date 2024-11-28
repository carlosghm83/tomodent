@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Editar Paciente</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4>Formulario de Edición</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Campo Nombre -->
                        <div class="form-group">
                            <label for="nombre"><i class="bi bi-person-circle"></i> Nombre Completo</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $paciente->nombre) }}" required>
                            @error('nombre') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <!-- Campo Fecha de Nacimiento -->
                        <div class="form-group">
                            <label for="fecha_nacimiento"><i class="bi bi-calendar-date"></i> Fecha de Nacimiento</label>
                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento) }}" required>
                            @error('fecha_nacimiento') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <!-- Campo Celular -->
                        <div class="form-group">
                            <label for="celular"><i class="bi bi-phone"></i> Celular</label>
                            <input type="text" id="celular" name="celular" class="form-control" value="{{ old('celular', $paciente->celular) }}" required>
                            @error('celular') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <!-- Botones -->
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btn-lg">Actualizar Paciente</button>
                            <a href="{{ route('pacientes.index') }}" class="btn btn-danger btn-lg ml-3">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
