<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function showEntradaForm()
    {
        return view('entrada.registrar');
    }

    public function registrarEntrada(Request $request)
    {
        // Validar el QR o la clave
        $vehiculo = Vehiculo::where('qr_path', $request->input('qr_path'))
                            ->orWhere('clave_acceso', $request->input('clave'))
                            ->first();

        if ($vehiculo) {
            Entrada::create([
                'vehiculo_id' => $vehiculo->id,
                'user_id' => $vehiculo->user_id,
                'hora_entrada' => now(),
            ]);

            return redirect()->route('entrada.registrar')->with('success', 'Entrada registrada correctamente.');
        }

        return redirect()->route('entrada.registrar')->with('error', 'Vehículo no encontrado.');
    }

    public function showSalidaForm()
    {
        return view('salida.registrar');
    }

    public function registrarSalida(Request $request)
    {
        $entrada = Entrada::where('vehiculo_id', $request->input('vehiculo_id'))
                          ->whereNull('hora_salida')
                          ->first();

        if ($entrada) {
            $entrada->update(['hora_salida' => now()]);
            return redirect()->route('salida.registrar')->with('success', 'Salida registrada correctamente.');
        }

        return redirect()->route('salida.registrar')->with('error', 'Entrada no encontrada.');
    }

    public function historial(Request $request)
    {
        $query = Entrada::query();

        // Filtrar por usuario
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->input('user_id'));
        }

        // Filtrar por fecha
        if ($request->filled('fecha')) {
            $query->whereDate('hora_entrada', $request->input('fecha'));
        }

        // Filtrar por placa
        if ($request->filled('placa')) {
            $query->whereHas('vehiculo', function ($q) use ($request) {
                $q->where('placa', $request->input('placa'));
            });
        }

        // Filtrar por tipo de vehículo
        if ($request->filled('tipo')) {
            $query->whereHas('vehiculo', function ($q) use ($request) {
                $q->where('tipo', $request->input('tipo'));
            });
        }

        $entradas = $query->with('vehiculo', 'user')->get();

        return view('historial.index', compact('entradas'));
    }
}
