<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VehiculoController extends Controller
{
    /**
     * Muestra una lista de los vehículos registrados.
     */
    public function index()
    {
        // Obtener todos los vehículos de la base de datos
        $vehiculos = Vehiculo::all();

        // Retornar la vista con los datos
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        return view('vehiculos.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del vehículo
        $validatedData = $request->validate([
            'placa' => 'required|string|max:7',
            'tipo' => 'required|string',
            'color' => 'nullable|string|max:20',
            'marca' => 'nullable|string|max:30',
            'modelo' => 'nullable|string|max:4',
        ]);

        // Generar una clave de acceso aleatoria
        $claveAcceso = Str::random(10);

        // Crear el vehículo
        $vehiculo = Vehiculo::create([
            'user_id' => auth()->id(),
            'placa' => $validatedData['placa'],
            'tipo' => $validatedData['tipo'],
            'color' => $validatedData['color'],
            'marca' => $validatedData['marca'],
            'modelo' => $validatedData['modelo'],
            'clave_acceso' => $claveAcceso,
        ]);

        // Generar el QR
        $qrContent = "Placa: {$vehiculo->placa}, Clave: {$vehiculo->clave_acceso}";
        $qrPath = "qrs/{$vehiculo->placa}.png";

        // Guardar el QR en el sistema de archivos
        Storage::disk('public')->put($qrPath, QrCode::format('png')->size(200)->generate($qrContent));

        // Actualizar la ruta del QR en la base de datos
        $vehiculo->update(['qr_path' => $qrPath]);

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo registrado correctamente.');
    }
}