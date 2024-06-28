<?php

use App\Models\Observacao;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('insumos', function (Blueprint $table) {
            $table->foreignIdFor(Observacao::class)->nullable()->change();
        });
        Schema::table('receitas', function (Blueprint $table) {
            $table->foreignIdFor(Observacao::class)->nullable()->change();
        });
        Schema::table('produtos', function (Blueprint $table) {
            $table->foreignIdFor(Observacao::class)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('insumos', function (Blueprint $table) {
            $table->foreignIdFor(Observacao::class)->change();
        });
        Schema::table('receitas', function (Blueprint $table) {
            $table->foreignIdFor(Observacao::class)->change();
        });
        Schema::table('produtos', function (Blueprint $table) {
            $table->foreignIdFor(Observacao::class)->change();
        });
    }
};
