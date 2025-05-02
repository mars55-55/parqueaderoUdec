<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\VehiculoRequest; // form request con validaciones

class VehiculoController extends Controller
{
    public function index()
    {
        // Obtener vehículos del usuario autenticado
        $vehiculos = Auth::user()->vehiculos()->latest()->paginate(10);
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        return view('vehiculos.create');
    }

    public function store(VehiculoRequest $request)
    {
        // Asociar el vehículo al usuario autenticado
        Auth::user()->vehiculos()->create($request->validated());

        return redirect()->route('dashboard')->with('success', 'Vehículo registrado correctamente.');
    }

    public function show(Vehiculo $vehiculo)
    {
        return view('vehiculos.show', compact('vehiculo'));
    }

    public function edit(Vehiculo $vehiculo)
    {
        return view('vehiculos.edit', compact('vehiculo'));
    }

    public function update(VehiculoRequest $request, Vehiculo $vehiculo)
    {
        $vehiculo->update($request->validated());
        return redirect()->route('vehiculos.show', $vehiculo)
                         ->with('success', 'Vehículo actualizado correctamente.');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')
                         ->with('success', 'Vehículo eliminado correctamente.');
    }
}
