<?php

use App\Models\Insumo;
use App\Models\Produto;
use App\Models\Receita;
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
        Schema::create('produtos_itens', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Produto::class);
            $table->foreignIdFor(Receita::class);
            $table->foreignIdFor(Insumo::class);
            $table->decimal('quantidade', 8, 2);
            $table->decimal('porcentagem_mao_obra', 5, 2);
            $table->decimal('porcentagem_lucro', 5, 2);

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos_itens');
    }
};
