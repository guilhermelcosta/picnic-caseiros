<?php

use App\Models\Observacao;
use App\Models\Pedido;
use App\Models\Produto;
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
        Schema::create('pedidos_itens', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Pedido::class);
            $table->integer('numero_sequencial');
            $table->foreignIdFor(Produto::class);
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 8, 2);
            $table->foreignIdFor(Observacao::class)->nullable();

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_itens');
    }
};
