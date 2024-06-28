<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtositem extends Model
{
    protected $table = 'produtos_itens';

    protected $fillable = [
        'produto_id',
        'receita_id',
        'insumo_id',
        'quantidade',
        'porcentagem_mao_obra',
        'porcentagem_lucro',
        'unidade',

    ];


    protected $dates = [

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/produtos-itens/'.$this->getKey());
    }
}
