<?php

use App\Models\Insumo;
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
        Schema::create('receitas_ingredientes', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Receita::class);
            $table->foreignIdFor(Insumo::class);
            $table->decimal('quantidade', 8, 2);
            $table->string('unidade', 5);

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receitas_ingredientes');
    }
};
