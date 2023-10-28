<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\UnidadeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', [UnidadeController::class, 'index'])->name('unidades.index');

Route::prefix('unidades')->group(function () {
    Route::get('/', [UnidadeController::class, 'index'])->name('unidades.index');
    Route::get('/create', [UnidadeController::class, 'create'])->name('unidades.create');
    Route::post('/store', [UnidadeController::class, 'store'])->name('unidades.store');
});

Route::prefix('cargos')->group(function () {
    Route::get('/', [CargoController::class, 'index'])->name('cargos.index');
    Route::get('/create', [CargoController::class, 'create'])->name('cargos.create');
    Route::post('/store', [CargoController::class, 'store'])->name('cargos.store');
});

Route::prefix('colaboradores')->group(function () {
    Route::get('/', [ColaboradorController::class, 'index'])->name('colaboradores.index');
    Route::get('/create', [ColaboradorController::class, 'create'])->name('colaboradores.create');
    Route::post('/store', [ColaboradorController::class, 'store'])->name('colaboradores.store');
    Route::get('/{colaborador}/edit', [ColaboradorController::class, 'edit'])->name('colaborador.edit');
    Route::patch('/{colaborador}', [ColaboradorController::class, 'update'])->name('colaborador.update');
    Route::get('/search', [ColaboradorController::class, 'search'])->name('colaboradores.search');
});

Route::get('/', [RelatorioController::class, 'index'])->name('relatorios.index');
