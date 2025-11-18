<?php

namespace Database\Factories;

use App\Models\Rifa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rifa>
 */
class RifaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            // Garante que campos NOT NULL sejam preenchidos
            'title' => $this->faker->words(3, true) . ' Raffle',
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'value' => $this->faker->randomFloat(2, 5, 50),
            'total_numbers' => $this->faker->numberBetween(100, 1000),
            'numbers_sold' => 0,
            'draw_date' => now()->addDays(30),
            'status' => 'active',
            
            //winner_client_id e winner_number são opcionais (nullable)
        ];
    }
}
