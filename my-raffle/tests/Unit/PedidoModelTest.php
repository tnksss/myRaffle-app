<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test; // Adicione esta linha!
use Tests\TestCase;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Rifa;
use App\Models\Numero;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PedidoModelTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function a_pedido_belongs_to_a_cliente_and_a_rifa()
    {
        // 1. Criar os Models necessários
        $cliente = Cliente::factory()->create();
        $rifa = Rifa::factory()->create();
        
        // 2. Criar o Pedido
        $pedido = Pedido::factory()->create([
            'client_id' => $cliente->id,
            'rifa_id' => $rifa->id,
        ]);

        // 3. Verificar os relacionamentos (Belongs To)
        $this->assertTrue($pedido->cliente instanceof Cliente);
        $this->assertTrue($pedido->rifa instanceof Rifa);
    }
    
    #[Test]
    public function a_pedido_has_many_numeros()
    {
        // 1. Criar o Pedido
        $pedido = Pedido::factory()->create();

        // 2. Criar 5 Números associados ao Pedido
        Numero::factory(5)->create(['pedido_id' => $pedido->id]);

        // 3. Verificar o relacionamento (Has Many)
        $this->assertCount(5, $pedido->numeros);
        $this->assertTrue($pedido->numeros->first() instanceof Numero);
    }
}