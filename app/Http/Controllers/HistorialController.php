<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historial; // Asegúrate de tener un modelo Historial
use App\Models\Vehiculo; // Relación con vehículos, si aplica

class HistorialController extends Controller
{
    /**
     * Muestra el historial de entradas y salidas.
     */
    public function index()
    {
        $historials = Historial::with('vehiculo')->orderBy('created_at', 'desc')->paginate(10);

        return view('historial.index', compact('historials'));
    }

    /**
     * Filtra el historial según los parámetros proporcionados.
     */
    public function filter(Request $request)
    {
        // Validar los parámetros de filtro
        $request->validate([
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
            'vehiculo_id' => 'nullable|exists:vehiculos,id',
        ]);

        // Construir la consulta
        $query = Historial::query();

        if ($request->filled('fecha_inicio')) {
            $query->where('created_at', '>=', $request->fecha_inicio);
        }

        if ($request->filled('fecha_fin')) {
            $query->where('created_at', '<=', $request->fecha_fin);
        }

        if ($request->filled('vehiculo_id')) {
            $query->where('vehiculo_id', $request->vehiculo_id);
        }

        // Obtener los resultados filtrados
        $historial = $query->with('vehiculo')->orderBy('created_at', 'desc')->paginate(10);

        // Retornar la vista con los datos filtrados
        return view('historial.index', compact('historial'));
    }

    /**
     * Registra una nueva acción en el historial.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'accion' => 'required|string',
        ]);

        Historial::create([
            'vehiculo_id' => $request->vehiculo_id,
            'accion' => $request->accion,
        ]);

        return redirect()->route('historial.index')->with('success', 'Acción registrada en el historial.');
    }
}
