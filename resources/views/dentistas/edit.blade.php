@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3>Editar Dentista</h3>
                    </div>
                    <div class="card-body">
                        <!-- Formulario para editar el dentista -->
                        <form action="{{ route('dentistas.update', $dentista->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $dentista->nombre) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Correo electrónico:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $dentista->email) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $dentista->fecha_nacimiento) }}">
                            </div>

                            <div class="form-group">
                                <label for="consultorio">Consultorio:</label>
                                <input type="text" name="consultorio" id="consultorio" class="form-control" value="{{ old('consultorio', $dentista->consultorio) }}">
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección:</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion', $dentista->direccion) }}">
                            </div>

                            <div class="form-group">
                                <label for="celular">Celular:</label>
                                <input type="text" name="celular" id="celular" class="form-control" value="{{ old('celular', $dentista->celular) }}">
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" name="password" id="password" class="form-control">
                                <small class="form-text text-muted">Deja en blanco si no deseas cambiar la contraseña.</small>
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Actualizar Dentista</button>
                                <a href="{{ route('dentistas.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
