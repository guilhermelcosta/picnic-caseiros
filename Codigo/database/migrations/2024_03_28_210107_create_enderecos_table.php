<?php

use App\Models\LogradourosTipo;
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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(LogradourosTipo::class);
            $table->string('logradouro', 150);
            $table->integer('numero')->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('bairro', 50);
            $table->string('cidade', 50);
            $table->string('estado', 20);
            $table->string('pais', 10)->default('Brasil');
            $table->string('cep', 10)->nullable();

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
