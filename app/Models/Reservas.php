<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    protected $fillable = ['data_checkin', 'data_checkout', 'quarto_id', 'cliente_id'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($reserva) {
            if ($reserva->exists && $reserva->data_checkin > $reserva->data_checkout) {
                // Aborta a operação se a data de check-in for maior que a data de check-out
                return false;
            }
        });
    }

    public function quartos()
    {
        return $this->belongsTo(Quartos::class);
    }

    public function clientes()
    {
        return $this->belongsTo(Clientes::class);
    }

    /**
     * Essa consulta visualiza as reservar feitas por um cliente específico pelo email.
     *
     * @param string $email
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function reservasPorCliente($email)
    {
        $cliente = Clientes::where('email', $email)->first();

        if ($cliente) {
            return self::where('cliente_id', $cliente->id)->get();
        } else {
            return response()->json(['error' => 'O email que você digitou não está acossado a nenhuma reserva.'], 500); // Retorna uma mensagem de erro se a reserva não for encontrada.
        }
    }
}
