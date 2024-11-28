<?php

namespace App\Http\Controllers;

use App\Models\Dentista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DentistaController extends Controller
{
    // Mostrar el formulario para crear un nuevo dentista
    public function create()
    {
        return view('dentistas.create');
    }

    // Almacenar el dentista en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:dentistas,email',
            'password' => 'required|string|min:8',
        ]);

        Dentista::create([
            'nombre' => $request->nombre,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'consultorio' => $request->consultorio,
            'direccion' => $request->direccion,
            'celular' => $request->celular,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dentistas.index')->with('success', 'Dentista registrado con éxito');
    }

    // Mostrar la lista de dentistas
    public function index()
    {
        $dentistas = Dentista::paginate(10); // O el número de registros por página que prefieras
        return view('dentistas.index', compact('dentistas'));
    }

    // Mostrar el formulario para editar un dentista
    public function edit(Dentista $dentista)
    {
        return view('dentistas.edit', compact('dentista'));
    }

    // Actualizar los datos del dentista en la base de datos
    public function update(Request $request, Dentista $dentista)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:dentistas,email,' . $dentista->id,
            'password' => 'nullable|string|min:8',
        ]);

        $dentista->update([
            'nombre' => $request->nombre,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'consultorio' => $request->consultorio,
            'direccion' => $request->direccion,
            'celular' => $request->celular,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $dentista->password,
        ]);

        return redirect()->route('dentistas.index')->with('success', 'Dentista actualizado con éxito');
    }

    // Eliminar un dentista de la base de datos
    public function destroy(Dentista $dentista)
    {
        $dentista->delete();
        return redirect()->route('dentistas.index')->with('success', 'Dentista eliminado con éxito');
    }
}
