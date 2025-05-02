<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Verificar si el usuario está autenticado y tiene el rol requerido
        if (Auth::check() && Auth::user()->tipo_usuario === $role) {
            return $next($request);
        }

        // Redirigir si no tiene el rol adecuado
        return redirect()->route('dashboard')->with('error', 'No tienes permiso para acceder a esta sección.');
    }
}
