<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quartos;

class QuartoController extends Controller
{
    /**
     * Método para listar os quartos que estão disponíveis para reserva.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listarDisponiveis()
    {
        try {
            $quartosDisponiveis = Quartos::where('disponivel', true)->get();

            return response()->json(['quartos_disponiveis' => $quartosDisponiveis], 200);
        } catch (\Exception $e) {
            //  Em caso de erro é exibida essa mensagem.
            return response()->json(['error' => 'Erro ao listar quartos disponíveis.'], 500);
        }
    }
}
