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
        Schema::table('produtos_custos', function (Blueprint $table) {
            $table->datetimeTz('inicio_vigencia')->nullable()->change();
            $table->datetimeTz('fim_vigencia')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos_custos', function (Blueprint $table) {
            $table->datetime('inicio_vigencia')->nullable()->change();
            $table->datetime('fim_vigencia')->nullable()->change();
        });
    }
};
