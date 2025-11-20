<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Attributes\Test;


use Tests\TestCase;
use App\Models\User;


class RifaManagementTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    
    public function validRifaData($overrides = [])
    {
        return array_merge([
            'title' => $this->faker->words(3, true),
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'value' => 10.00,
            'total_numbers' => 100,
            'draw_date' => now()->addDays(30)->format('Y-m-d H:i:s'),
            'status' => 'active',
        ], $overrides);
    }
    private function signInAdmin()
    {
        return User::factory()->create();
    }
    #[Test]
    public function non_authenticated_user_cannot_view_rifa_creation_form()
{
    // A rota 'admin.rifas.create' deve estar definida em routes/web.php
    $response = $this->get(route('admin.rifas.create')); 

    // O Laravel deve redirecionar o usuário para a página de login
    $response->assertRedirect(route('login'));}
}
