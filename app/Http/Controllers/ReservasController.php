<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ReservasController extends Controller
{
    /**
    * Lista todas as reservas ou as reservas dentro de um intervalo de datas.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\JsonResponse
    */
    public function index(Request $request)
    {
        try {
            $dataFiltro = $request->input('data');
    
            $query = Reservas::query();
    
            if ($dataFiltro) {
                $query->whereDate('data_checkin', '<=', $dataFiltro)
                    ->whereDate('data_checkout', '>=', $dataFiltro);
            }
    
            $reservas = $query->get();
    
            return response()->json(['reservas' => $reservas], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao listar reservas.'], 500);
        }
    }

    /**
     * Lista as reservas de um cliente específico pelo email.
     *
     * @param string $email
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($email = null)
    {
        try {
            $key = "reservas_$email";
            $expiration = 600; // 10 minutos
    
            if ($email) {
                // Tentar obter as reservas do Redis
                $reservas = Redis::get($key);
    
                if (!$reservas) {
                    // Se não estiver no Redis, obter do banco de dados
                    $reservas = Reservas::reservasPorCliente($email);
    
                    // Armazenar as reservas no Redis com um tempo de expiração
                    Redis::setex($key, $expiration, json_encode($reservas));
                } else {
                    // Se estiver no Redis, decodificar as reservas
                    $reservas = json_decode($reservas);
                }
            } else {
                $reservas = Reservas::all();
            }
    
            return response()->json(['reservas' => $reservas], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao listar reservas do cliente.'], 500);
        }
    }

    /**
    * Lista todas as reservas feitas por um cliente específico (ID).
    *
    * @param int $clienteId
    * @return \Illuminate\Http\JsonResponse
    */
    public function listarPorClienteId($clienteId)
    {
        try {
            $reservas = Reservas::where('cliente_id', $clienteId)->get();

            return response()->json(['reservas' => $reservas], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao listar reservas do cliente.'], 500);
        }
    }
}