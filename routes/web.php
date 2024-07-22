<?php

use App\Http\Controllers\AssuntosController;
use App\Http\Controllers\AutoresController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

/**
 * Rota para a Home
 */
Route::get('/', function () {
    return view('index');
});

/**
 * Rota para gerar o relatório PDF
 */
Route::get('/report/generatePDF/{page}', [PdfController::class, 'generatePDF'])->name('report.generatePDF');

/**
 * Rotas da tela de Livros
 * @LivrosController
 */
Route::get('/livros', [LivrosController::class, 'index'])->name('livros.index');
Route::get('/livros/show/{livro}', [LivrosController::class, 'show'])->name('livros.show');
Route::get('/livros/create', [LivrosController::class, 'create'])->name('livros.create');
Route::get('/livros/edit/{livro}', [LivrosController::class, 'edit'])->name('livros.edit');
Route::post('/livros/save', [LivrosController::class, 'store'])->name('livros.save');
Route::put('/livros/update/{livro}', [LivrosController::class, 'update'])->name('livros.update');
Route::delete('/livros/destroy/{livro}', [LivrosController::class, 'destroy'])->name('livros.destroy');

/**
 * Rotas da tela de Assuntos
 * @AssuntosController
 */
Route::get('/assuntos', [AssuntosController::class, 'index'])->name('assuntos.index');
Route::get('/assuntos/show/{assunto}', [AssuntosController::class, 'show'])->name('assuntos.show');
Route::get('/assuntos/create', [AssuntosController::class, 'create'])->name('assuntos.create');
Route::get('/assuntos/edit/{assunto}', [AssuntosController::class, 'edit'])->name('assuntos.edit');
Route::post('/assuntos/save', [AssuntosController::class, 'store'])->name('assuntos.save');
Route::put('/assuntos/update/{assunto}', [AssuntosController::class, 'update'])->name('assuntos.update');
Route::delete('/assuntos/destroy/{assunto}', [AssuntosController::class, 'destroy'])->name('assuntos.destroy');

/**
 * Rotas da tela de Autores
 * @AutoresController
 */
Route::get('/autores', [AutoresController::class, 'index'])->name('autores.index');
Route::get('/autores/show/{autor}', [AutoresController::class, 'show'])->name('autores.show');
Route::get('/autores/create', [AutoresController::class, 'create'])->name('autores.create');
Route::get('/autores/edit/{autor}', [AutoresController::class, 'edit'])->name('autores.edit');
Route::post('/autores/save', [AutoresController::class, 'store'])->name('autores.save');
Route::put('/autores/update/{autor}', [AutoresController::class, 'update'])->name('autores.update');
Route::delete('/autores/destroy/{autor}', [AutoresController::class, 'destroy'])->name('autores.destroy');


