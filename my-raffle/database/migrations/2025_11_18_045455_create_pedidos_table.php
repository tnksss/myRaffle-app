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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            // Relações com o cliente e a rifa
            $table->foreignId('client_id')->constrained('clientes'); 
            $table->foreignId('rifa_id')->constrained('rifas');
            
            $table->decimal('total_amount', 8, 2);
            
            // Campos de Status e PIX
            $table->string('payment_status', 50)->default('pending'); // pending, paid, expired, cancelled
            $table->string('pix_txid')->unique(); // ID único da transação PIX
            $table->text('pix_payload')->nullable(); // PIX Copia e Cola / QR Code
            
            // Campos de Tempo
            $table->dateTime('reserved_at');
            $table->dateTime('expires_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
