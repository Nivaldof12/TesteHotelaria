<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\Quartos;
use App\Models\Reservas;

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
            $key = 'quartos_disponiveis';
            $expiration = 600; // 10 minutos

            // Tentar obter a lista de quartos disponíveis do Redis
            $quartosDisponiveis = Redis::get($key);

            if (!$quartosDisponiveis) {
                // Se não estiver no Redis, obter do banco de dados
                $quartosDisponiveis = Quartos::where('disponivel', true)->get();

                // Armazenar a lista no Redis com um tempo de expiração
                Redis::setex($key, $expiration, json_encode($quartosDisponiveis));
            } else {
                // Se estiver no Redis, decodificar a lista
                $quartosDisponiveis = json_decode($quartosDisponiveis);
            }

            return response()->json(['quartos_disponiveis' => $quartosDisponiveis], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao listar quartos disponíveis.'], 500);
        }
    }

/**
 * Lista todos os quartos ocupados em uma data específica.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\JsonResponse
 */
public function quartosOcupados(Request $request)
{
    try {
        $dataFiltro = $request->input('data');

        $query = Reservas::whereDate('data_checkin', '<=', $dataFiltro)
            ->whereDate('data_checkout', '>=', $dataFiltro)
            ->pluck('quarto_id');

        $quartosOcupados = Quartos::whereIn('id', $query)->get();

        return response()->json(['quartos_ocupados' => $quartosOcupados], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erro ao listar quartos ocupados.'], 500);
    }
}
}
