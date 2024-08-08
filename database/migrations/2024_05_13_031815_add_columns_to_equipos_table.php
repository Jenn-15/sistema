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
            $table->string('serie');
            $table->foreignId('marca_id')->constrained()->onDelete('cascade');
            $table->string('modelo');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('area_id')->constrained()->onDelete('cascade');
            $table->foreignId('estado_id')->constrained()->onDelete('cascade');
            $table->foreignId('empleado_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipos', function (Blueprint $table) {
            
            $table->dropForeign('equipos_area_id_foreign');
            $table->dropForeign('equipos_categoria_id_foreign');
            $table->dropForeign('equipos_empleado_id_foreign');
            $table->dropForeign('equipos_estado_id_foreign');
            $table->dropForeign('equipos_marca_id_foreign');
            $table->dropForeign('equipos_user_id_foreign');

            $table->dropColumn(['serie', 'marca_id', 'modelo','categoria_id','area_id', 'estado_id','empleado_id','user_id']);
        });
    }
};
