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
            $table->dropForeign(['estado_id']); // Eliminar la clave foránea
            $table->dropColumn('estado_id'); // Eliminar el campo estado_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipos', function (Blueprint $table) {
            //
            $table->foreignId('estado_id')->constrained()->onDelete('cascade'); // Añadir de nuevo la clave foránea
        });
    }
};
