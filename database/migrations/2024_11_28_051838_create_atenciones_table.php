<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtencionesTable extends Migration
{
    public function up()
    {
        Schema::create('atenciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dentista_id')->constrained('dentistas'); // Relaciona con la tabla dentistas
            $table->foreignId('paciente_id')->constrained('pacientes'); // Relaciona con la tabla pacientes
            $table->date('fecha');
            $table->foreignId('servicio_id')->constrained('servicios'); // Relaciona con la tabla servicios
            $table->decimal('precio', 10, 2);
            $table->integer('puntos')->default(0); // Los puntos abonados al dentista
            $table->decimal('descuento', 5, 2)->nullable()->default(0); // El descuento aplicado al servicio
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('atenciones');
    }
}
