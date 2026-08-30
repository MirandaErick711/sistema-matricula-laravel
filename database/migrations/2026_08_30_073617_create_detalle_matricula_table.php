<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_matricula', function (Blueprint $table) {
            $table->id();

            $table->foreignId('matricula_id')
                ->constrained('matriculas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('grupo_id')
                ->constrained('grupos')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->decimal('nota', 4, 2)
                ->nullable();

            $table->unique([
                'matricula_id',
                'grupo_id'
            ]);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_matricula');
    }
};