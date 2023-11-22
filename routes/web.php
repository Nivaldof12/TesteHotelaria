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

//OBS: Todas as rotas exigem autenticação; é necessário fazer o login para acessá-las.

Route::middleware(['auth'])->group(function () {
    
    //Rotas Quartos:
    //Lista todos os quartos disponíveis.
    Route::get('/quartos/disponiveis', [QuartoController::class, 'listarDisponiveis']);

    //Método para consultar todos os quartos ocupados em uma data específica.
    // /quartos?data=
    Route::get('/quartos', [QuartoController::class, 'quartosOcupados']);

    //Rotas Reservas:
    //Lista todas as reservas ou com o método de consulta por data.
    // /reservas?data=
    Route::get('/reservas', [ReservasController::class, 'index']);

    //Como foi solicitado, criei um método para listar todas as reservas feitas por clientes específicos. 
    //Nesse endpoint, o cliente está sendo filtado pelo email.
    // E quando consultado as informações do cliente são armazenadas no Redis.
    Route::get('/reservas/{email?}', [ReservasController::class, 'show']);

    // No endpoint abaixo, as reservas estão sendo retornadas a partir do id do cliente.
    Route::get('/reservas/id/{clienteId}', [ReservasController::class, 'listarPorClienteId']);
});

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