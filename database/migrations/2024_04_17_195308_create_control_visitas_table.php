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
        Schema::create('control_visitas', function (Blueprint $table) {
            $table->id();
            $table->time('hora_entrada')->nullable();
            $table->time('hora_salida')->nullable();
            $table->foreignId('id_visita')->nullable()->constrained('visitas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('control_visitas');
    }
};
