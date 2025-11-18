<?php

namespace Database\Factories;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Rifa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'client_id' => Cliente::factory(), // Cria um cliente automaticamente
            'rifa_id' => Rifa::factory(), // Cria uma rifa automaticamente
            'total_amount' => $this->faker->randomFloat(2, 10, 500),
            'payment_status' => 'pending',
            'pix_txid' => $this->faker->uuid,
            'reserved_at' => now(),
            'expires_at' => now()->addMinutes(30),
        ];
    }
}
