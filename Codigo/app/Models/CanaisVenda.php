<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CanaisVenda extends Model
{
    protected $fillable = [
        'descricao',
        'comissao',
        'unidade_comissao',
        'desconto',
        'unidade_desconto',
    
    ];
    
    
    protected $dates = [
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/canais-vendas/'.$this->getKey());
    }


}
