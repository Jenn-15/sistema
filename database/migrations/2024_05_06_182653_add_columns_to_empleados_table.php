<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->foreignId('area_id')->constrained()->onDelete('cascade');
            $table->string('numeroT');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropForeign('empleados_area_id_foreign');
            $table->dropForeign('empleados_user_id_foreign');
            
            $table->dropColumn(['nombre', 'apellido_paterno', 'apellido_materno','area_id', 'numeroT','user_id']);
        });
    }
};
