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
        Schema::create('incentivos_vendas', function (Blueprint $table) {
            $table->id();

            $table->string('descricao', 50);
            $table->decimal('valor', 8, 2);
            $table->string('unidade', 5);
            $table->decimal('maximo_moeda', 8, 2);
            $table->dateTimeTz('inicio_vigencia')->nullable();
            $table->dateTimeTz('fim_vigencia')->nullable();
            $table->boolean('is_ativo')->default(true);

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incentivos_vendas');
    }
};
