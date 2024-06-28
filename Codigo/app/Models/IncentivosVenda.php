<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncentivosVenda extends Model
{
    protected $fillable = [
        'descricao',
        'valor',
        'unidade',
        'maximo_moeda',
        'inicio_vigencia',
        'fim_vigencia',
        'is_ativo',
    
    ];
    
    
    protected $dates = [
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/incentivos-vendas/'.$this->getKey());
    }
}
