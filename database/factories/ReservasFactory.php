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
        $dataCheckin = $this->faker->dateTimeThisMonth;
        $dataCheckout = $this->faker->dateTimeBetween($dataCheckin, '+30 days');

        return [
            'data_checkin' => $dataCheckin,
            'data_checkout' => $dataCheckout,
            'quarto_id' => \App\Models\Quartos::factory(),
            'cliente_id' => \App\Models\Clientes::factory(),
        ];
    }
}
