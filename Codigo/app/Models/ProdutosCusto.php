<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutosCusto extends Model
{
    protected $fillable = [
        'produto_id',
        'canais_venda_id',
        'inicio_vigencia',
        'fim_vigencia',
        'valor_custo',
        'valor_venda',

    ];


    protected $dates = [
        'inicio_vigencia',
        'fim_vigencia',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/produtos-custos/'.$this->getKey());
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function canalVenda()
    {
        return $this->belongsTo(CanaisVenda::class, 'canais_venda_id', 'id');
    }
}
