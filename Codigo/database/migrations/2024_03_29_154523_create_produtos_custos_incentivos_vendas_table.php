<?php

use App\Models\IncentivosVenda;
use App\Models\ProdutosCusto;
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
        Schema::create('produtos_custos_incentivos_vendas', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(IncentivosVenda::class);
            $table->foreignIdFor(ProdutosCusto::class);

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos_custos_incentivos_vendas');
    }
};
