<?php

use App\Models\Cliente;
use App\Models\ContatosTipo;
use App\Models\Fornecedor;
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
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Fornecedor::class)->nullable();
            $table->foreignIdFor(Cliente::class)->nullable();
            $table->foreignIdFor(ContatosTipo::class);
            $table->string('contato', 50);

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatos');
    }
};
