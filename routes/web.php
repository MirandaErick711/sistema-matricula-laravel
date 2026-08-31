<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\DetalleMatriculaController;

// Página principal y Dashboard
Route::view('/', 'welcome')->name('home');
Route::get('/dashboard', DashboardController::class)->name('dashboard');

// Módulos CRUD Académicos
Route::resource('carreras', CarreraController::class);
Route::resource('docentes', DocenteController::class);
Route::resource('aulas', AulaController::class);
Route::resource('cursos', CursoController::class);
Route::resource('horarios', HorarioController::class);
Route::resource('estudiantes', EstudianteController::class);
Route::resource('matriculas', MatriculaController::class);

// Gestión de cursos / horarios en la matrícula
Route::get('matriculas/{matricula}/horarios/create', [DetalleMatriculaController::class, 'create'])->name('detalle-matricula.create');
Route::post('matriculas/{matricula}/horarios', [DetalleMatriculaController::class, 'store'])->name('detalle-matricula.store');
Route::delete('matriculas/{matricula}/horarios/{detalle}', [DetalleMatriculaController::class, 'destroy'])->name('detalle-matricula.destroy');