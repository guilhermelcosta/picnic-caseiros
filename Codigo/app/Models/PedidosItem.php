<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidosItem extends Model
{
    protected $table = 'pedidos_itens';

    protected $fillable = [
        'pedido_id',
        'numero_sequencial',
        'produto_id',
        'quantidade',
        'preco_unitario',
        'observacao_id',
    
    ];
    
    
    protected $dates = [
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/pedidos-itens/'.$this->getKey());
    }
}
