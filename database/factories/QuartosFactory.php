<?php

namespace Database\Factories;

use App\Models\Quartos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quartos>
 */
class QuartosFactory extends Factory
{
    protected $model = Quartos::class;

    public function definition()
    {
        return [
            'numero' => $this->faker->unique()->randomNumber(),
            'capacidade' => $this->faker->numberBetween(1, 4),
            'preco_diaria' => $this->faker->randomFloat(2, 50, 200),
            'disponivel' => $this->faker->boolean(80),
        ];
    }
}
