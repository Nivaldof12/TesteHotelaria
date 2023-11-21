<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuartoController;
use App\Http\Controllers\ReservasController;

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

//Rotas Referente a Quartos
//Lista todos os quartos disponíveis.
Route::get('/quartos/disponiveis', [QuartoController::class, 'listarDisponiveis']);

//Reservas:
//Lista todas as reservas ou com os métodos de consulta por data.
Route::get('/reservas', [ReservasController::class, 'index']);

//Como foi solicitado, criei um método para listar todas as reservas feitas por clientes específicos, 
//Nesse endpoint, o cliente está sendo filtado pelo email.
Route::get('/reservas/{email?}', [ReservasController::class, 'show']);

//E nesse endpoint, o cliente está sendo filtado pelo id.
Route::get('/reservas/id/{clienteId?}', [ReservasController::class, 'listarPorClienteId']);