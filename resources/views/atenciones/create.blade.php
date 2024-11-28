@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center text-primary">Registrar Atención</h1>

    <form action="{{ route('atenciones.store') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dentista_id" class="font-weight-bold text-secondary">Dentista</label>
                    <select class="form-control" name="dentista_id" id="dentista_id">
                        <option value="" disabled selected>Selecciona un dentista</option>
                        @foreach($dentistas as $dentista)
                            <option value="{{ $dentista->id }}">{{ $dentista->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="paciente_id" class="font-weight-bold text-secondary">Paciente</label>
                    <select class="form-control" name="paciente_id" id="paciente_id">
                        <option value="" disabled selected>Selecciona un paciente</option>
                        @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="fecha" class="font-weight-bold text-secondary">Fecha de la atención</label>
            <input type="date" class="form-control" name="fecha" id="fecha" required value="{{ date('Y-m-d') }}">
        </div>

        <div class="form-group">
            <label for="servicio_id" class="font-weight-bold text-secondary">Servicio</label>
            <select class="form-control" name="servicio_id" id="servicio_id" onchange="updateServiceDetails()">
                <option value="" disabled selected>Selecciona un servicio</option>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}" 
                            data-precio="{{ $servicio->precio }}" 
                            data-puntos="{{ $servicio->puntos }}">
                        {{ $servicio->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="precio" class="font-weight-bold text-secondary">Precio (S/)</label>
            <input type="number" class="form-control" name="precio" id="precio" required readonly>
        </div>

        <div class="form-group">
            <label for="puntos" class="font-weight-bold text-secondary">Puntos</label>
            <input type="number" class="form-control" name="puntos" id="puntos" readonly>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="descuento" onchange="updateDiscount()">
            <label class="form-check-label text-secondary" for="descuento">Aplicar descuento</label>
        </div>

        <div class="form-group">
            <label for="descuento_valor" class="font-weight-bold text-secondary">Descuento (S/)</label>
            <input type="number" class="form-control" name="descuento_valor" id="descuento_valor" min="0" step="0.01" readonly>
        </div>

        <button type="submit" class="btn btn-success btn-block mt-3">Registrar Atención</button>
    </form>
</div>

<script>
    var precioOriginal;
    var puntosOriginal;

    function updateServiceDetails() {
        // Obtener el servicio seleccionado
        var servicioSelect = document.getElementById('servicio_id');
        var precio = servicioSelect.options[servicioSelect.selectedIndex].getAttribute('data-precio');
        var puntos = servicioSelect.options[servicioSelect.selectedIndex].getAttribute('data-puntos');
        
        // Establecer el precio y los puntos en los campos correspondientes
        precioOriginal = parseFloat(precio);
        puntosOriginal = parseFloat(puntos);

        document.getElementById('precio').value = precioOriginal;
        document.getElementById('puntos').value = puntosOriginal;
        document.getElementById('descuento_valor').value = 0; // Reset descuento
        updateDiscount(); // Actualizar descuento si está seleccionado
    }

    function updateDiscount() {
        var precio = parseFloat(document.getElementById('precio').value);
        var puntos = parseFloat(document.getElementById('puntos').value);
        var descuentoCheckbox = document.getElementById('descuento');
        var descuentoValor = document.getElementById('descuento_valor');

        if (descuentoCheckbox.checked) {
            // Aplicar descuento restando el valor de los puntos del precio
            var descuento = puntosOriginal * 1; // 1 sol por punto
            var precioConDescuento = precioOriginal - descuento;

            // Asegurar que el precio no sea negativo
            if (precioConDescuento < 0) {
                precioConDescuento = 0;
            }

            // Actualizar el precio con descuento y puntos a 0
            document.getElementById('precio').value = precioConDescuento;
            document.getElementById('puntos').value = 0;
            descuentoValor.value = descuento; // Mostrar el valor del descuento
        } else {
            // Si no se marca el descuento, restaurar los valores originales
            document.getElementById('precio').value = precioOriginal;
            document.getElementById('puntos').value = puntosOriginal;
            descuentoValor.value = 0;
        }
    }

    // Establecer la fecha actual en la caja de fecha cuando se carga la página
    document.getElementById('fecha').value = new Date().toISOString().split('T')[0];
</script>

@endsection
