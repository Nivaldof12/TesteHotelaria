<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quartos;

class QuartosSeeder extends Seeder
{
    public function run()
    {
        Quartos::factory(10)->create();
    }
}
