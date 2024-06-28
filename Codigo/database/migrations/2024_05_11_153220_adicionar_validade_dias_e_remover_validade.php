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
        Schema::table('receitas', function (Blueprint $table) {
            $table->integer('validade_dias')->nullable();
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('validade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receitas', function (Blueprint $table) {
            $table->dropColumn('validade_dias');
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->date('validade')->nullable();
        });
    }
};
