<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Vehiculo extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vehiculo) {
            $vehiculo->clave_acceso = Str::random(10); // Generar clave alfanumérica
            $vehiculo->qr_path = 'qrcodes/' . $vehiculo->placa . '.png'; // Ruta del QR
            QrCode::format('png')->size(200)->generate($vehiculo->clave_acceso, public_path($vehiculo->qr_path));
        });
    }
}
