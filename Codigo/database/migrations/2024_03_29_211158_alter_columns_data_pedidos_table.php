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
        Schema::table('pedidos', function (Blueprint $table) {
            $table->datetimeTz('data_confirmacao_pedido')->nullable()->change();
            $table->datetimeTz('data_entrega_prevista')->nullable()->change();
            $table->datetimeTz('data_entrega_realizada')->nullable()->change();
            $table->datetimeTz('data_limite_entrada')->nullable()->change();
            $table->datetimeTz('data_pedido')->change();
            $table->datetimeTz('data_pagto_entrada')->nullable()->change();
            $table->datetimeTz('data_restante')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->datetime('data_confirmacao_pedido')->nullable()->change();
            $table->datetime('data_entrega_prevista')->nullable()->change();
            $table->datetime('data_entrega_realizada')->nullable()->change();
            $table->datetime('data_limite_entrada')->nullable()->change();
            $table->datetime('data_pedido')->change();
            $table->datetime('data_pagto_entrada')->nullable()->change();
            $table->datetime('data_restante')->nullable()->change();
        });
    }
};
