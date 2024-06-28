<?php

use App\Models\Observacao;
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
        Schema::create('receitas', function (Blueprint $table) {
            $table->id();

            $table->string('descricao', 100);
            $table->string('modo_preparo', 2000);
            $table->integer('rendimento');
            $table->decimal('porcao', 8, 2);
            $table->string('unidade_porcao', 5);
            $table->boolean('preparo_altera_peso')->default(false);
            $table->decimal('percentual_altera_peso', 5, 2)->nullable();
            $table->foreignIdFor(Observacao::class);

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receitas');
    }
};
