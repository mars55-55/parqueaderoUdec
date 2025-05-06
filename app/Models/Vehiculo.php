<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = ['placa', 'tipo', 'color', 'marca', 'modelo', 'clave_acceso', 'qr_path', 'user_id'];

    public function historials()
    {
        return $this->hasMany(Historial::class);
    }
}
