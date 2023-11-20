<?php

namespace Database\Factories;

use App\Models\Reservas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservas>
 */
class ReservasFactory extends Factory
{
    protected $model = Reservas::class;

    public function definition()
    {
        return [
            'data_checkin' => $this->faker->date(),
            'data_checkout' => $this->faker->date(),
            'quarto_id' => \App\Models\Quartos::factory(),
            'cliente_id' => \App\Models\Clientes::factory(),
        ];
    }
}
