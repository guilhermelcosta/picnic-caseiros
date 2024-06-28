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
        Schema::create('pedidos_cancelamentos', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Pedido::class);
            $table->foreignIdFor(PedidosItem::class)->nullable();
            $table->datetimeTz('data_solicitacao');
            $table->decimal('taxa_cancelamento', 5, 2);
            $table->string('unidade', 5);
            $table->decimal('valor_cancelamento', 8, 2);
            $table->decimal('valor_reembolso', 8, 2);
            $table->date('data_reembolso')->nullable();

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos_cancelamentos');
    }
};
