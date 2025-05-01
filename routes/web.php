<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProducoesAudiovisuaisController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LiteraturaController;
use App\Http\Controllers\ExercicioController;
use App\Http\Controllers\ConsumoAguaController;
use App\Http\Controllers\VisitaGastronomicaController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Produções Audiovisuais
Route::get('/producoes', [ProducoesAudiovisuaisController::class, 'index'])->name('producoes.index');
Route::get('/producoes/create', [ProducoesAudiovisuaisController::class, 'create'])->name('producoes.create');
Route::post('/producoes', [ProducoesAudiovisuaisController::class, 'store'])->name('producoes.store');
Route::get('/producoes/{id}/edit', [ProducoesAudiovisuaisController::class, 'edit'])->name('producoes.edit');
Route::put('/producoes/{id}', [ProducoesAudiovisuaisController::class, 'update'])->name('producoes.update');
Route::delete('/producoes/{id}', [ProducoesAudiovisuaisController::class, 'destroy'])->name('producoes.destroy');

/*

// Games
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::get('/games/{id}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('/games/{id}', [GameController::class, 'update'])->name('games.update');
Route::delete('/games/{id}', [GameController::class, 'destroy'])->name('games.destroy');


// Literatura
Route::get('/literatura', [LiteraturaController::class, 'index'])->name('literatura.index');
Route::get('/literatura/create', [LiteraturaController::class, 'create'])->name('literatura.create');
Route::post('/literatura', [LiteraturaController::class, 'store'])->name('literatura.store');
Route::get('/literatura/{id}/edit', [LiteraturaController::class, 'edit'])->name('literatura.edit');
Route::put('/literatura/{id}', [LiteraturaController::class, 'update'])->name('literatura.update');
Route::delete('/literatura/{id}', [LiteraturaController::class, 'destroy'])->name('literatura.destroy');


// Exercícios
Route::get('/exercicios', [ExercicioController::class, 'index'])->name('exercicios.index');
Route::get('/exercicios/create', [ExercicioController::class, 'create'])->name('exercicios.create');
Route::post('/exercicios', [ExercicioController::class, 'store'])->name('exercicios.store');
Route::get('/exercicios/{id}/edit', [ExercicioController::class, 'edit'])->name('exercicios.edit');
Route::put('/exercicios/{id}', [ExercicioController::class, 'update'])->name('exercicios.update');
Route::delete('/exercicios/{id}', [ExercicioController::class, 'destroy'])->name('exercicios.destroy');


// Consumo de Água
Route::get('/consumo-agua', [ConsumoAguaController::class, 'index'])->name('agua.index');
Route::get('/consumo-agua/create', [ConsumoAguaController::class, 'create'])->name('agua.create');
Route::post('/consumo-agua', [ConsumoAguaController::class, 'store'])->name('agua.store');
Route::get('/consumo-agua/{id}/edit', [ConsumoAguaController::class, 'edit'])->name('agua.edit');
Route::put('/consumo-agua/{id}', [ConsumoAguaController::class, 'update'])->name('agua.update');
Route::delete('/consumo-agua/{id}', [ConsumoAguaController::class, 'destroy'])->name('agua.destroy');


// Visitas Gastronômicas
Route::get('/visitas', [VisitaGastronomicaController::class, 'index'])->name('visitas.index');
Route::get('/visitas/create', [VisitaGastronomicaController::class, 'create'])->name('visitas.create');
Route::post('/visitas', [VisitaGastronomicaController::class, 'store'])->name('visitas.store');
Route::get('/visitas/{id}/edit', [VisitaGastronomicaController::class, 'edit'])->name('visitas.edit');
Route::put('/visitas/{id}', [VisitaGastronomicaController::class, 'update'])->name('visitas.update');
Route::delete('/visitas/{id}', [VisitaGastronomicaController::class, 'destroy'])->name('visitas.destroy');
*/