<?php

namespace App\Http\Controllers;

use App\Models\Atencion;
use App\Models\Dentista;
use App\Models\Paciente;
use App\Models\Servicio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Método que maneja la página de inicio
    public function index()
    {
        // Obtener el número total de atenciones
        $totalAtenciones = Atencion::count();

        // Obtener la suma de los puntos de todas las atenciones
        $totalPuntos = Atencion::sum('puntos');

        // Obtener las últimas 5 atenciones
        $ultimasAtenciones = Atencion::latest()->take(5)->get();

        // Pasamos los datos a la vista
        return view('home', compact('totalAtenciones', 'totalPuntos', 'ultimasAtenciones'));
    }
}
