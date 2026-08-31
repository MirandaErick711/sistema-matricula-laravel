<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')
                ->constrained('estudiantes')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('semestre', 20)->default('2026-I');
            $table->date('fecha_matricula');
            $table->string('estado', 30)->default('Activa');
            $table->unique(['estudiante_id', 'semestre']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
