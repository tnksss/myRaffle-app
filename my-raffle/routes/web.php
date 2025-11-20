<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RifaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// ROTAS DO ADMIN PROTEGIDAS
Route::middleware(['auth'])->prefix('admin')->group(function(){
    // A rota nomeada 'admin.rifas.create' depende desta linha
    Route::resource('rifas', RifaController::class)->names('admin.rifas');
    
    // Rota de dashboard, opcionalmente
    Route::get('/', [RifaController::class,'index'])->name('admin.dashboard'); 
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
