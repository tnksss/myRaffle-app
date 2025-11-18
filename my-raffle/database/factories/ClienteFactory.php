<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    protected $model = Cliente::class;
    
    public function definition()
    {
        return [
            // O faker garante que os campos obrigatórios não serão nulos
            'name' => $this->faker->name,
            'whatsapp' => '5541' . $this->faker->randomNumber(9, true), // Formato de número válido
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
