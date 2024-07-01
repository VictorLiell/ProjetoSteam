<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DistribuidoraController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\JogoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('distribuidoras', DistribuidoraController::class);
Route::resource('genero', GeneroController::class);
Route::resource('plataformas' , PlataformaController::class);
Route::resource('jogos', JogoController::class);

require __DIR__.'/auth.php';
