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
        Schema::table('produtos_itens', function (Blueprint $table) {
            $table->foreignIdFor(Receita::class)->nullable()->change();
            $table->foreignIdFor(Insumo::class)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos_itens', function (Blueprint $table) {
            $table->foreignIdFor(Receita::class)->change();
            $table->foreignIdFor(Insumo::class)->change();
        });
    }
};
