<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Cursos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20);
            $table->string('nombre');
            $table->integer('horas_teoria');
            $table->integer('horas_practica');
            $table->string('docente');
            $table->string('aula', 20);
            $table->integer('creditos');
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('Cursos');
    }
};