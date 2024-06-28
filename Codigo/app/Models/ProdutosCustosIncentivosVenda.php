<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutosCustosIncentivosVenda extends Model
{
    protected $fillable = [
        'incentivos_venda_id',
        'produtos_custo_id',
    
    ];
    
    
    protected $dates = [
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/produtos-custos-incentivos-vendas/'.$this->getKey());
    }
}
