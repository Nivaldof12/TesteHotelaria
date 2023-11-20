<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    protected $fillable = ['data_checkin', 'data_checkout', 'quarto_id', 'cliente_id'];

    public function quartos()
    {
        return $this->belongsTo(Quartos::class);
    }

    public function clientes()
    {
        return $this->belongsTo(Clientes::class);
    }
}
