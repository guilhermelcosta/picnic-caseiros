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
        Schema::create('canais_vendas', function (Blueprint $table) {
            $table->id();

            $table->string('descricao', 50);
            $table->decimal('comissao', 5, 2)->nullable();
            $table->string('unidade_comissao', 5)->nullable();
            $table->decimal('desconto', 5, 2)->nullable();
            $table->string('unidade_desconto', 5)->nullable();

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canais_vendas');
    }
};
