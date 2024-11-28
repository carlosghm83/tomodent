<?php

namespace App\Http\Controllers;

use App\Models\Atencion;
use App\Models\Dentista;
use App\Models\Paciente;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AtencionController extends Controller
{
    
    // Método para mostrar todas las atenciones
    public function index()
    {
        // Obtener todas las atenciones con relación a los dentistas, pacientes, y servicios
        $atenciones = Atencion::with('dentista', 'paciente', 'servicio')->paginate(10);

        // Retornar la vista con los datos de las atenciones
        return view('atenciones.index', compact('atenciones'));
    }


    // Mostrar formulario de creación
    public function create()
    {
        $dentistas = Dentista::all(); // Obtener todos los dentistas
        $pacientes = Paciente::all(); // Obtener todos los pacientes
        $servicios = Servicio::all(); // Obtener todos los servicios disponibles
        return view('atenciones.create', compact('dentistas', 'pacientes', 'servicios'));
    }

    // Almacenar una nueva atención
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'dentista_id' => 'required|exists:dentistas,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha' => 'required|date',
            'servicio_id' => 'required|exists:servicios,id',
            'precio' => 'required|numeric',
            'descuento' => 'nullable|numeric|min:0|max:'.$request->precio, // No puede ser mayor que el precio
        ]);

        // Obtener el servicio y los puntos correspondientes
        $servicio = Servicio::find($request->servicio_id);
        $puntos = $servicio->puntos;

        // Si hay descuento, no se abonan puntos
        if ($request->descuento > 0) {
            $puntos = 0;
        }

        // Crear la atención en la base de datos
        Atencion::create([
            'dentista_id' => $request->dentista_id,
            'paciente_id' => $request->paciente_id,
            'fecha' => $request->fecha,
            'servicio_id' => $request->servicio_id,
            'precio' => $request->precio - $request->descuento, // Aplicar descuento
            'puntos' => $puntos, // Asignar puntos
            'descuento' => $request->descuento, // Guardar descuento
        ]);

        return redirect()->route('atenciones.index')->with('success', 'Atención registrada correctamente');
    }



    public function edit($id)
{
    $atencion = Atencion::findOrFail($id);
    $dentistas = Dentista::all();
    $pacientes = Paciente::all();
    $servicios = Servicio::all();

    return view('atenciones.edit', compact('atencion', 'dentistas', 'pacientes', 'servicios'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'dentista_id' => 'required|exists:dentistas,id',
        'paciente_id' => 'required|exists:pacientes,id',
        'fecha' => 'required|date',
        'servicio_id' => 'required|exists:servicios,id',
        'precio' => 'required|numeric',
        'puntos' => 'required|numeric',
        'descuento' => 'nullable|boolean',
    ]);

    $atencion = Atencion::findOrFail($id);
    $atencion->dentista_id = $request->dentista_id;
    $atencion->paciente_id = $request->paciente_id;
    $atencion->fecha = $request->fecha;
    $atencion->servicio_id = $request->servicio_id;
    $atencion->precio = $request->precio;
    $atencion->puntos = $request->puntos;

    // Si hay descuento, no se asignan puntos
    if ($request->has('descuento') && $request->descuento) {
        $atencion->puntos = 0;
    }

    $atencion->descuento = $request->has('descuento') && $request->descuento;
    $atencion->save();

    return redirect()->route('atenciones.index')->with('success', 'Atención actualizada con éxito.');
}


}
