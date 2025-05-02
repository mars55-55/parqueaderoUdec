<?php

use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\EntradaController;
use Illuminate\Support\Facades\Route;

// Página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Dashboard - Acceso solo para usuarios autenticados
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Rutas de autenticación (registro, login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Rutas de perfil de usuario (solo si está autenticado)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de vehículos (solo si está autenticado)
Route::middleware('auth')->group(function () {
    Route::get('vehiculos/create', [VehiculoController::class, 'create'])->name('vehiculos.create');
    Route::post('vehiculos', [VehiculoController::class, 'store'])->name('vehiculos.store');
    Route::get('vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index'); // Listar vehículos registrados
    Route::get('vehiculos/{vehiculo}/edit', [VehiculoController::class, 'edit'])->name('vehiculos.edit');
    Route::patch('vehiculos/{vehiculo}', [VehiculoController::class, 'update'])->name('vehiculos.update');
    Route::delete('vehiculos/{vehiculo}', [VehiculoController::class, 'destroy'])->name('vehiculos.destroy');
});

// Historial de entradas y salidas (solo si está autenticado)
Route::middleware('auth')->group(function () {
    Route::get('historial', [HistorialController::class, 'index'])->name('historial.index');
    Route::get('historial/filtrar', [HistorialController::class, 'filter'])->name('historial.filter');
});

// Rutas de entradas y salidas (solo si está autenticado)
Route::middleware(['auth', 'role:Vigilante'])->group(function () {
    Route::get('/entrada', [EntradaController::class, 'showEntradaForm'])->name('entrada.registrar');
    Route::post('/entrada', [EntradaController::class, 'registrarEntrada']);
    Route::get('/salida', [EntradaController::class, 'showSalidaForm'])->name('salida.registrar');
    Route::post('/salida', [EntradaController::class, 'registrarSalida']);
    Route::get('/historial', [EntradaController::class, 'historial'])->name('historial.index');
});

// Cerrar sesión
Route::middleware('auth')->post('/logout', [LoginController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';
