<?php

use App\Models\CanaisVenda;
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
        Schema::create('produtos_custos', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Produto::class);
            $table->foreignIdFor(CanaisVenda::class);
            $table->datetime('inicio_vigencia')->nullable();
            $table->datetime('fim_vigencia')->nullable();
            $table->decimal('valor_custo', 8, 2);
            $table->decimal('valor_venda', 8, 2);

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos_custos');
    }
};
