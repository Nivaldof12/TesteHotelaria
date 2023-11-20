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
    return view('welcome');
});

//Rotas Referente a Quartos
//Lista todos os quartos disponíveis.
Route::get('/quartos/disponiveis', [QuartoController::class, 'listarDisponiveis']);

//Rotas Referente a Reservas
//Lista todas as reservas feitas.
Route::get('/reservas', [ReservasController::class, 'index']);
//Lista todas as reservas especificas feitas por email.
Route::get('/reservas/{email?}', [ReservasController::class, 'show']);