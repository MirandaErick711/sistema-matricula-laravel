<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\SemestreAcademicoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CarreraCursoController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\DetalleMatriculaController;

Route::inertia('/', 'welcome')->name('home');
//comentario
Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});


//EDDY: CURSOS Y PRE-REQUISITO

Route::resource('cursos', CursoController::class);
Route::resource('carreras', CarreraController::class);
Route::resource('docentes', DocenteController::class);
Route::resource('aulas', AulaController::class);
Route::resource('semestres-academicos',SemestreAcademicoController::class);
Route::resource('estudiantes', EstudianteController::class);
require __DIR__.'/settings.php';
Route::get('carreras/{carrera}/cursos/edit',[CarreraCursoController::class, 'edit'])->name('carreras.cursos.edit');
Route::put('carreras/{carrera}/cursos',[CarreraCursoController::class, 'update'])->name('carreras.cursos.update');
Route::resource('grupos', GrupoController::class);
Route::resource('horarios', HorarioController::class);
Route::resource('matriculas',MatriculaController::class);
Route::get(
    'matriculas/{matricula}/grupos/create',
    [DetalleMatriculaController::class, 'create']
)->name('detalle-matricula.create');

Route::post(
    'matriculas/{matricula}/grupos',
    [DetalleMatriculaController::class, 'store']
)->name('detalle-matricula.store');

Route::delete(
    'matriculas/{matricula}/grupos/{detalle}',
    [DetalleMatriculaController::class, 'destroy']
)->name('detalle-matricula.destroy');