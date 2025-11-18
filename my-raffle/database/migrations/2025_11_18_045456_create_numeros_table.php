<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('numeros', function (Blueprint $table) {
            $table->id();
            // Rifa à qual este número pertence (Relação 1:M)
            $table->foreignId('rifa_id')->constrained('rifas')->onDelete('cascade'); 
            
            $table->integer('number');
            
            // Status: available, reserved, sold
            $table->string('status', 50)->default('available');

            // Pedido de compra associado (Nullable, pois números começam disponíveis)
            // Note: 'clientes' precisa ser criado antes, mas como usamos foreignId, 
            // a ordem de execução do migrate é importante.
            $table->foreignId('pedido_id')->nullable()->constrained('pedidos')->onDelete('set null');
            
            // Opcional: Para controle de expiração de reserva
            $table->dateTime('reserved_until')->nullable(); 

            // Índice para garantir a unicidade de um número dentro de uma rifa específica
            $table->unique(['rifa_id', 'number']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('numeros');
    }
};
