<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsumosCusto extends Model
{
    protected $fillable = [
        'insumo_id',
        'insumos_marca_id',
        'fornecedor_id',
        'data_compra',
        'quantidade',
        'unidade',
        'valor_compra',
        'valor_unitario',
        'is_atual',

    ];


    protected $dates = [
        'data_compra',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/insumos-custos/'.$this->getKey());
    }

    public function insumo()
    {
        return $this->belongsTo(Insumo::class);
    }

    public function marca()
    {
        return $this->belongsTo(InsumosMarca::class, 'insumos_marca_id', 'id');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id', 'id');
    }
}
