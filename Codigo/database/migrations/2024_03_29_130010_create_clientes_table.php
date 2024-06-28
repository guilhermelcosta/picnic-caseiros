<?php

use App\Models\DocumentosTipo;
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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();

            $table->string('nome', 30);
            $table->string('sobrenome', 100)->nullable();
            $table->string('apelido', 30)->nullable();
            $table->string('documento', 15)->nullable();
            $table->foreignIdFor(DocumentosTipo::class)->nullable();
            $table->date('data_aniversario')->nullable();
            $table->foreignIdFor(Endereco::class)->nullable();
            $table->foreignIdFor(Observacao::class)->nullable();

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
