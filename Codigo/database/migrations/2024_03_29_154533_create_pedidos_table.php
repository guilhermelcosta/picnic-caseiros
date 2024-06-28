<?php

use App\Models\CanaisVenda;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\FormasPagamento;
use App\Models\Observacao;
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

            $table->foreignIdFor(Cliente::class);
            $table->foreignIdFor(CanaisVenda::class);
            $table->datetime('data_confirmacao_pedido')->nullable();
            $table->datetime('data_entrega_prevista')->nullable();
            $table->datetime('data_entrega_realizada')->nullable();

            $table->unsignedBigInteger('forma_pagto_entrada_id')->nullable();
            $table->foreign('forma_pagto_entrada_id')->references('id')->on('formas_pagamentos');

            $table->datetime('data_limite_entrada')->nullable();
            $table->decimal('porcentagem_entrada', 5, 2)->nullable();
            $table->datetime('data_pedido');
            $table->decimal('valor_entrada', 8, 2)->nullable();
            $table->datetime('data_pagto_entrada')->nullable();

            $table->unsignedBigInteger('forma_pagto_restante_id')->nullable();
            $table->foreign('forma_pagto_restante_id')->references('id')->on('formas_pagamentos');

            $table->datetime('data_restante')->nullable();
            $table->decimal('valor_restante', 8, 2)->nullable();
            $table->foreignIdFor(Observacao::class)->nullable();

            $table->unsignedBigInteger('endereco_entrega_id')->nullable();
            $table->foreign('endereco_entrega_id')->references('id')->on('enderecos');

            $table->timestampsTz();
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
