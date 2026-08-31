<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')
                ->constrained('cursos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('aula_id')
                ->constrained('aulas')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('dia', 20);
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
