<?php

namespace App\Http\Controllers;

use App\Models\Atencion;
use App\Models\Dentista;
use App\Models\Paciente;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        // Inicializamos la consulta
        $query = Atencion::query();

        // Filtrar por dentista
        if ($request->has('dentista_id') && $request->dentista_id) {
            $query->where('dentista_id', $request->dentista_id);
        }

        // Filtrar por paciente
        if ($request->has('paciente_id') && $request->paciente_id) {
            $query->where('paciente_id', $request->paciente_id);
        }

        // Filtrar por servicio
        if ($request->has('servicio_id') && $request->servicio_id) {
            $query->where('servicio_id', $request->servicio_id);
        }

        // Filtrar por fecha (rango de fechas)
        if ($request->has('fecha_inicio') && $request->fecha_inicio) {
            $query->whereDate('fecha', '>=', $request->fecha_inicio);
        }

        if ($request->has('fecha_fin') && $request->fecha_fin) {
            $query->whereDate('fecha', '<=', $request->fecha_fin);
        }

        // Ejecutar la consulta y obtener las atenciones
        //$atenciones = $query->get();
        $atenciones = $query->with('servicio')->get();
      
        //dd($atenciones);


        // Realizar el conteo y cálculos
       // $total_placas = $atenciones->sum('cantidad_placas');  // Sumar cantidad de placas
       $total_placas = $atenciones->sum(function ($atencion) {
        return $atencion->servicio ? $atencion->servicio->cantidad_placas : 0;  // Sumar la cantidad de placas desde el servicio
        }); 
       
       $total_precio = $atenciones->sum('precio');
        $total_puntos = $atenciones->sum('puntos');

        // Obtener listas de dentistas, pacientes y servicios para los filtros
        $dentistas = Dentista::all();
        $pacientes = Paciente::all();
        $servicios = Servicio::all();

        // Pasamos los resultados y las listas a la vista
        return view('reportes.index', compact('atenciones', 'total_placas', 'total_precio', 'total_puntos', 'dentistas', 'pacientes', 'servicios'));
    }
}
