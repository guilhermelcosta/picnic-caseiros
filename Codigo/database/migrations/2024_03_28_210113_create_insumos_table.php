<?php

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
        Schema::create('insumos', function (Blueprint $table) {
            $table->id();

            $table->string('descricao', 100);
            $table->foreignIdFor(Observacao::class);
            $table->decimal('percentual_desperdicio', 5, 2)->nullable();
            $table->decimal('quantidade_referencia', 8, 2);
            $table->string('unidade_referencia', 5);
            $table->decimal('preco_pos_desperdicio', 8, 2);
            $table->boolean('is_ativo');

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insumos');
    }
};
