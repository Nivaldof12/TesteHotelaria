<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservas;

class ReservasSeeder extends Seeder
{
    public function run()
    {
        Reservas::factory(7)->create();
    }
}
