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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->constrained()->onDelete('cascade');
            $table->foreignId('empleado_id')->constrained()->onDelete('cascade');
            $table->string('descripcionProblema');
            $table->string('diagnostico')->nullable(true);
            $table->string('autoriza')->nullable(true);
            $table->string('tecnico')->nullable(true);
            $table->date('fecha_solicitud');
            $table->date('fecha_servicio')->nullable(true);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
