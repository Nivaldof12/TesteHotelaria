<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuartoController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\ProfileController;

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

// Página Home
Route::get('/', function () {
    return view('home');
});

//Rotas Quartos:
//Lista todos os quartos disponíveis.
if (app()->environment('local')) {
    Route::get('/quartos/disponiveis', [QuartoController::class, 'listarDisponiveis']);
} else {
    Route::middleware(['auth'])->group(function () {
        Route::get('/quartos/disponiveis', [QuartoController::class, 'listarDisponiveis']);
    });
}

//Rotas Reservas:
//Lista todas as reservas ou com os métodos de consulta por data.
// /reservas?data=
if (app()->environment('local')) {
    Route::get('/reservas', [ReservasController::class, 'index']);
} else {
    Route::middleware(['auth'])->group(function () {
        Route::get('/reservas', [ReservasController::class, 'index']);
    });
}

//Como foi solicitado, criei um método para listar todas as reservas feitas por clientes específicos, 
//Nesse endpoint, o cliente está sendo filtado pelo email.
// E quando consultado as informações do cliente são armazenadas no Redis.
if (app()->environment('local')) {
    Route::get('/reservas/{email?}', [ReservasController::class, 'show']);
} else {
    Route::middleware(['auth'])->group(function () {
        Route::get('/reservas/{email?}', [ReservasController::class, 'show']);
    });
}

//E nesse endpoint, o cliente está sendo filtado pelo id.
if (app()->environment('local')) {
    Route::get('/reservas/id/{clienteId?}', [ReservasController::class, 'listarPorClienteId']);
} else {
    Route::middleware(['auth'])->group(function () {
        Route::get('/reservas/id/{clienteId?}', [ReservasController::class, 'listarPorClienteId']);
    });
}

//Rotas da autenticação:
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';