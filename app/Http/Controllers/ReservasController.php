<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    /**
     * Lista todas as reservas.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $reservas = Reservas::all();

            return response()->json(['reservas' => $reservas], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao listar todas as reservas.'], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
            if ($email) {
                $reservas = Reservas::reservasPorCliente($email);
            } else {
                $reservas = Reservas::all();
            }

            return response()->json(['reservas' => $reservas], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao listar reservas do cliente.'], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservas $reservas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservas $reservas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservas $reservas)
    {
        //
    }
}
