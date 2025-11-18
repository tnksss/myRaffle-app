<?php

namespace Database\Factories;
use \App\Models\Rifa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Numero>
 */
class NumeroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition()
    {
        return [
            // Rifa deve existir para que o número exista
            'rifa_id' => Rifa::factory(), 
            'number' => $this->faker->numberBetween(1, 1000),
            'status' => 'available',
            // O pedido_id é nullable, mas pode ser opcionalmente associado aqui
            'pedido_id' => null, 
        ];
    }
}
