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
        // Validar la clave de acceso
        $request->validate([
            'clave_acceso' => 'required|string',
        ]);

        // Buscar el vehículo por clave de acceso
        $vehiculo = Vehiculo::where('clave_acceso', $request->clave_acceso)->first();

        if (!$vehiculo) {
            return redirect()->back()->withErrors(['clave_acceso' => 'Clave de acceso o QR inválido.']);
        }

        // Determinar si es entrada o salida
        $ultimaAccion = Historial::where('vehiculo_id', $vehiculo->id)->latest()->first();
        $accion = ($ultimaAccion && $ultimaAccion->accion === 'Entrada') ? 'Salida' : 'Entrada';

        // Registrar la acción en el historial
        Historial::create([
            'vehiculo_id' => $vehiculo->id,
            'accion' => $accion,
        ]);

        return redirect()->route('historial.index')->with('success', "Se registró la $accion del vehículo con placa {$vehiculo->placa}.");
    }
}
