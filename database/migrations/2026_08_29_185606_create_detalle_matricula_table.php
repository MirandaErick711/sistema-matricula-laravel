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
        Schema::create('detalle_matricula', function (Blueprint $table) {
            $table->id();

            $table->foreignId('matricula_id')
                ->constrained('matriculas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('curso_id')
                ->constrained('cursos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->unique(['matricula_id', 'curso_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_matricula');
    }
};
