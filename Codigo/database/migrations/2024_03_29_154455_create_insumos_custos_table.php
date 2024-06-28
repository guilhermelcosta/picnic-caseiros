<?php

use App\Models\Fornecedor;
use App\Models\Insumo;
use App\Models\InsumosMarca;
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
        Schema::create('insumos_custos', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Insumo::class);
            $table->foreignIdFor(InsumosMarca::class)->nullable();
            $table->foreignIdFor(Fornecedor::class)->nullable();
            $table->date('data_compra');
            $table->decimal('quantidade', 8, 2);
            $table->string('unidade', 5);
            $table->decimal('valor_compra', 8, 2);
            $table->decimal('valor_unitario', 8, 2);
            $table->boolean('is_atual')->default(true);

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insumos_custos');
    }
};
