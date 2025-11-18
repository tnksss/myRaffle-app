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
        Schema::create('rifas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); // Deve ser único
            $table->text('description');
            $table->decimal('value', 8, 2); // 999,999.99
            $table->integer('total_numbers');
            $table->integer('numbers_sold')->default(0); 
            $table->dateTime('draw_date');
            $table->integer('min_numbers_to_draw')->nullable();
            
            // Status: active, suspended, finished
            $table->string('status', 50)->default('active'); 

            // Campos do Ganhador
            $table->unsignedInteger('winner_number')->nullable();
            // A chave estrangeira para o ganhador (referencia a tabela 'clientes')
            $table->foreignId('winner_client_id')->nullable()->constrained('clientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rifas');
    }
};
