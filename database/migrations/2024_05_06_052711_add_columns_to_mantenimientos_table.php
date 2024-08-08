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
        Schema::table('mantenimientos', function (Blueprint $table) {
            $table->foreignId('equipo_id')->constrained()->onDelete('cascade');
            $table->foreignId('tipo_id')->constrained()->onDelete('cascade');
            $table->text('descripcion');
            $table->date('fecha');
            $table->string('costo');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mantenimientos', function (Blueprint $table) {
            $table->dropForeign('mantenimientos_equipo_id_foreign');
            $table->dropForeign('mantenimientos_tipo_id_foreign');
            $table->dropForeign('mantenimientos_user_id_foreign');
            $table->dropColumn(['equipo_id', 'tipo_id', 'descripcion', 'fecha', 'costo', 'user_id']);
        });
    }
};
