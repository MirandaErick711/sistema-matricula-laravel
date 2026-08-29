<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\CursoController;

Route::inertia('/', 'welcome')->name('home');
//comentario
Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});
Route::get('/articulos', function () {
    $articulos = array('Primero', 'Segundo','Tercero', 'Último');
    return view('articulos',['nombre' => 'Ane Aranceta','articulos' => $articulos]);
});

Route::get('articulos/{id}', [ArticuloController::class, 'show']);

Route::get('/personas', [PersonaController::class, 'create'])->name('personas.index');
Route::get('/personas/crear', [PersonaController::class, 'create'])->name('personas.crear');
Route::post('/personas', [PersonaController::class, 'store'])->name('personas.guardar');

Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::get('/cursos/crear', [CursoController::class, 'create'])->name('cursos.crear');
Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.guardar');

require __DIR__.'/settings.php'; 
