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
        Schema::create('dentistas', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->string('nombre'); // Nombre completo del dentista
            $table->date('fecha_nacimiento')->nullable(); // Fecha de nacimiento
            $table->string('consultorio')->nullable(); // Nombre del consultorio
            $table->string('direccion')->nullable(); // Dirección del consultorio
            $table->string('celular')->nullable(); // Número de celular
            $table->string('email')->unique(); // Correo electrónico
            $table->string('password'); // Contraseña (encriptada)
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dentistas');
    }
};
