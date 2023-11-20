<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clientes;

class ClientesSeeder extends Seeder
{
    public function run()
    {
        Clientes::factory(8)->create();
    }
}
