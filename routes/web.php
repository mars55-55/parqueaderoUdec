<?php

use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

use Illuminate\Support\Facades\Route;

// Página de inicio
Route::get('/', function () {
    return view('dashboard');
});

// Dashboard - Acceso solo para usuarios autenticados
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Rutas de autenticación (registro, login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'login']);
    Route::get('/register', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'register']);
});

// Rutas de perfil de usuario (solo si está autenticado)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de vehículos (solo si está autenticado)
Route::middleware('auth')->group(function () {
    Route::get('vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index'); // Listar vehículos registrados
    Route::get('vehiculos/create', [VehiculoController::class, 'create'])->name('vehiculos.create');
    Route::post('vehiculos', [VehiculoController::class, 'store'])->name('vehiculos.store');
    Route::get('vehiculos/{vehiculo}/edit', [VehiculoController::class, 'edit'])->name('vehiculos.edit');
    Route::patch('vehiculos/{vehiculo}', [VehiculoController::class, 'update'])->name('vehiculos.update');
    Route::delete('vehiculos/{vehiculo}', [VehiculoController::class, 'destroy'])->name('vehiculos.destroy');
});

// Rutas de historial (solo si está autenticado)
Route::middleware('auth')->group(function () {
    Route::get('historial', [HistorialController::class, 'index'])->name('historial.index');
    Route::get('historial/filtrar', [HistorialController::class, 'filter'])->name('historial.filter');
    Route::post('historial', [HistorialController::class, 'store'])->name('historial.store');
});

// Cerrar sesión
Route::middleware('auth')->post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

// Rutas de autenticación adicionales
require __DIR__.'/auth.php';
