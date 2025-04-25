<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('placa')->unique();
            $table->enum('tipo', ['Auto', 'Moto']);
            $table->string('color')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('clave_acceso')->nullable();
            $table->string('qr_path')->nullable(); // ruta al archivo QR
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
