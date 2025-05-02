<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasTable extends Migration
{
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->constrained()->onDelete('cascade'); // Relación con vehículos
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con usuarios
            $table->timestamp('hora_entrada')->nullable();
            $table->timestamp('hora_salida')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}
