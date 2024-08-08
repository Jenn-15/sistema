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
        Schema::table('equipos', function (Blueprint $table) {
            //
            $table->string('numero_inventario')->nullable(false);
            $table->string('descripcion')->nullable(false);
            $table->date('fecha_alta')->nullable(false);
            $table->date('fecha_resguardo')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipos', function (Blueprint $table) {
            //
            $table->dropColumn(['numero_inventario', 'descripcion', 'fecha_alta', 'fecha_resguardo']);
        });
    }
};
