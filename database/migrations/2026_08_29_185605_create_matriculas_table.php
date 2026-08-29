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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('estudiante_id')
                ->constrained('estudiantes')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('semestre_id')
                ->constrained('semestres_academicos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->date('fecha_matricula');
            $table->string('estado', 30);

            $table->unique(['estudiante_id', 'semestre_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
