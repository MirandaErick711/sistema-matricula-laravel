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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('curso_id')
                ->constrained('cursos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('semestre_id')
                ->constrained('semestres_academicos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('docente_id')
                ->constrained('docentes')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('aula_id')
                ->constrained('aulas')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('nombre', 10);

            $table->timestamps();

            $table->unique([
                'curso_id',
                'semestre_id',
                'nombre'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
