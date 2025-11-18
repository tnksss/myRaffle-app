<?php

namespace Tests\Unit;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClienteModelTest extends TestCase
{
    use RefreshDatabase;
    #[Test]
   public function a_client_has_fillable_attributes()
    {
        // Garante que campos como nome e contato podem ser preenchidos via mass assignment
        $data = [
            'name' => 'João da Silva',
            'whatsapp' => '5541998765432',
            'email' => 'joao.silva@teste.com',
        ];

        $cliente = Cliente::create($data);

        $this->assertEquals($data['name'], $cliente->name);
        $this->assertEquals($data['whatsapp'], $cliente->whatsapp);
    }

    #[Test]
    public function a_cliente_has_many_pedidos()
    {
        // 1. Criar um Cliente
        $cliente = Cliente::factory()->create(); 

        // 2. Criar 2 Pedidos associados a ele
        // Assumindo que Pedido::factory() pode ser chamado, necessita de PedidoFactory
        Pedido::factory(2)->create(['client_id' => $cliente->id]);

        // 3. Verificar o relacionamento
        $this->assertCount(2, $cliente->pedidos);
        $this->assertTrue($cliente->pedidos->first() instanceof Pedido);
    }
}
