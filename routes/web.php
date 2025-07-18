<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProducoesAudiovisuaisController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LiteraturaController;
use App\Http\Controllers\ExercicioController;
use App\Http\Controllers\ConsumoAguaController;
use App\Http\Controllers\VisitaGastronomicaController;
use App\Http\Controllers\ShowController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Produções Audiovisuais
Route::get('/producoes', [ProducoesAudiovisuaisController::class, 'index'])->name('producoes.index');
Route::get('/producoes/view/{id}', [ProducoesAudiovisuaisController::class, 'view'])->name('producoes.view');
Route::get('/producoes/create', [ProducoesAudiovisuaisController::class, 'create'])->name('producoes.create');
Route::post('/producoes', [ProducoesAudiovisuaisController::class, 'store'])->name('producoes.store');
Route::get('/producoes/{id}/edit', [ProducoesAudiovisuaisController::class, 'edit'])->name('producoes.edit');
Route::put('/producoes/{id}', [ProducoesAudiovisuaisController::class, 'update'])->name('producoes.update');
Route::delete('/producoes/{id}', [ProducoesAudiovisuaisController::class, 'destroy'])->name('producoes.destroy');
Route::get('/producoes/json', [ProducoesAudiovisuaisController::class, 'json'])->name('producoes.json');

// Games
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/view/{id}', [GameController::class, 'view'])->name('games.view');
Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::get('/games/{id}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('/games/{id}', [GameController::class, 'update'])->name('games.update');
Route::delete('/games/{id}', [GameController::class, 'destroy'])->name('games.destroy');

// Shows
Route::get('/shows', [ShowController::class, 'index'])->name('shows.index');
Route::get('/shows/view/{id}', [ShowController::class, 'view'])->name('shows.view');
Route::get('/shows/create', [ShowController::class, 'create'])->name('shows.create');
Route::post('/shows', [ShowController::class, 'store'])->name('shows.store');
Route::get('/shows/{id}/edit', [ShowController::class, 'edit'])->name('shows.edit');
Route::put('/shows/{id}', [ShowController::class, 'update'])->name('shows.update');
Route::delete('/shows/{id}', [ShowController::class, 'destroy'])->name('shows.destroy');

// Literatura
Route::get('/literatura', [LiteraturaController::class, 'index'])->name('literatura.index');
Route::get('/literatura/view/{id}', [LiteraturaController::class, 'view'])->name('literatura.view');
Route::get('/literatura/create', [LiteraturaController::class, 'create'])->name('literatura.create');
Route::post('/literatura', [LiteraturaController::class, 'store'])->name('literatura.store');
Route::get('/literatura/{id}/edit', [LiteraturaController::class, 'edit'])->name('literatura.edit');
Route::put('/literatura/{id}', [LiteraturaController::class, 'update'])->name('literatura.update');
Route::delete('/literatura/{id}', [LiteraturaController::class, 'destroy'])->name('literatura.destroy');

// Visitas Gastronômicas
Route::get('/visitas', [VisitaGastronomicaController::class, 'index'])->name('visitasgastronomicas.index');
Route::get('/visitas/view/{id}', [VisitaGastronomicaController::class, 'view'])->name('visitasgastronomicas.view');
Route::get('/visitas/create', [VisitaGastronomicaController::class, 'create'])->name('visitasgastronomicas.create');
Route::post('/visitas', [VisitaGastronomicaController::class, 'store'])->name('visitasgastronomicas.store');
Route::get('/visitas/{id}/edit', [VisitaGastronomicaController::class, 'edit'])->name('visitasgastronomicas.edit');
Route::put('/visitas/{id}', [VisitaGastronomicaController::class, 'update'])->name('visitasgastronomicas.update');
Route::delete('/visitas/{id}', [VisitaGastronomicaController::class, 'destroy'])->name('visitasgastronomicas.destroy');

/*
// Exercícios
Route::get('/exercicios', [ExercicioController::class, 'index'])->name('exercicios.index');
Route::get('/exercicios/view/{id}', [ExerciciosController::class, 'view'])->name('exercicios.view');
Route::get('/exercicios/create', [ExercicioController::class, 'create'])->name('exercicios.create');
Route::post('/exercicios', [ExercicioController::class, 'store'])->name('exercicios.store');
Route::get('/exercicios/{id}/edit', [ExercicioController::class, 'edit'])->name('exercicios.edit');
Route::put('/exercicios/{id}', [ExercicioController::class, 'update'])->name('exercicios.update');
Route::delete('/exercicios/{id}', [ExercicioController::class, 'destroy'])->name('exercicios.destroy');

// Consumo de Água
Route::get('/consumo-agua', [ConsumoAguaController::class, 'index'])->name('agua.index');
Route::get('/consumo-agua/view/{id}', [ConsumoAguaController::class, 'view'])->name('consumo-agua.view');
Route::get('/consumo-agua/create', [ConsumoAguaController::class, 'create'])->name('agua.create');
Route::post('/consumo-agua', [ConsumoAguaController::class, 'store'])->name('agua.store');
Route::get('/consumo-agua/{id}/edit', [ConsumoAguaController::class, 'edit'])->name('agua.edit');
Route::put('/consumo-agua/{id}', [ConsumoAguaController::class, 'update'])->name('agua.update');
Route::delete('/consumo-agua/{id}', [ConsumoAguaController::class, 'destroy'])->name('agua.destroy');

*/