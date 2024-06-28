<?php

use App\Models\Pedido;
use App\Models\PedidosItem;
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
        Schema::create('pedidos_descontos', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Pedido::class);
            $table->foreignIdFor(PedidosItem::class)->nullable();
            $table->decimal('desconto', 8, 2);
            $table->string('unidade_desconto', 5);
            $table->decimal('valor_desconto', 8, 2);

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_descontos');
    }
};
