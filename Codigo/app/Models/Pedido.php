<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'cliente_id',
        'canais_venda_id',
        'data_confirmacao_pedido',
        'data_entrega_prevista',
        'data_entrega_realizada',
        'forma_pagto_entrada_id',
        'data_limite_entrada',
        'porcentagem_entrada',
        'data_pedido',
        'valor_entrada',
        'data_pagto_entrada',
        'forma_pagto_restante_id',
        'data_restante',
        'valor_restante',
        'observacao_id',
        'endereco_entrega_id',
    
    ];
    
    
    protected $dates = [
        'data_confirmacao_pedido',
        'data_entrega_prevista',
        'data_entrega_realizada',
        'data_limite_entrada',
        'data_pedido',
        'data_pagto_entrada',
        'data_restante',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/pedidos/'.$this->getKey());
    }
}
