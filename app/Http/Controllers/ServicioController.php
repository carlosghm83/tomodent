<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    // Mostrar todos los servicios
    public function index()
    {
        $servicios = Servicio::all();
        return view('servicios.index', compact('servicios'));
    }

    // Mostrar el formulario para crear un nuevo servicio
    public function create()
    {
        return view('servicios.create');
    }

    // Almacenar un nuevo servicio
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cantidad_placas' => 'required|integer',
            'precio' => 'required|numeric',
            'puntos' => 'required|integer',
        ]);

        Servicio::create($request->all());

        return redirect()->route('servicios.index')->with('success', 'Servicio creado con éxito');
    }

    // Mostrar el formulario para editar un servicio
    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('servicios.edit', compact('servicio'));
    }

    // Actualizar el servicio
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cantidad_placas' => 'required|integer',
            'precio' => 'required|numeric',
            'puntos' => 'required|integer',
        ]);

        $servicio = Servicio::findOrFail($id);
        $servicio->update($request->all());

        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado con éxito');
    }

    // Eliminar un servicio
    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();

        return redirect()->route('servicios.index')->with('success', 'Servicio eliminado con éxito');
    }
}
