<?php

use App\Models\Endereco;
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
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();

            $table->string('nome', 100);
            $table->foreignIdFor(Endereco::class)->nullable();
            $table->string('nome_contato', 50)->nullable();
            $table->foreignIdFor(Observacao::class)->nullable();
            $table->boolean('is_ativo')->default(true);

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedores');
    }
};
