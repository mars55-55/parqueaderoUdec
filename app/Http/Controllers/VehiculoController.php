<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VehiculoController extends Controller
{
    public function create()
    {
        return view('vehiculos.create');
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'placa' => 'required|unique:vehiculos,placa',
            'tipo' => 'required|in:Auto,Moto',
            'color' => 'nullable|string',
            'marca' => 'nullable|string',
            'modelo' => 'nullable|string',
        ]);

        // Crear vehículo
        $vehiculo = new Vehiculo();
        $vehiculo->user_id = auth()->user()->id;
        $vehiculo->placa = $request->placa;
        $vehiculo->tipo = $request->tipo;
        $vehiculo->color = $request->color;
        $vehiculo->marca = $request->marca;
        $vehiculo->modelo = $request->modelo;

        // Generar clave de acceso
        $vehiculo->clave_acceso = strtoupper(str_random(8)); // Clave aleatoria

        // Generar QR
        $qrCode = QrCode::format('png')->size(200)->generate($vehiculo->placa);
        $qrPath = 'qrs/' . $vehiculo->placa . '.png'; // Ruta donde guardaremos el QR
        \Storage::put($qrPath, $qrCode); // Guardar el QR

        $vehiculo->qr_path = $qrPath;
        $vehiculo->save();

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo registrado con éxito');
    }
}
