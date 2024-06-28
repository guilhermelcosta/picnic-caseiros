<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receita extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'descricao',
        'modo_preparo',
        'rendimento',
        'porcao',
        'unidade_porcao',
        'validade_dias',
        'preparo_altera_peso',
        'percentual_altera_peso',
        'observacao_id',
        'deleted_at'
    ];


    protected $dates = [

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/receitas/'.$this->getKey());
    }

    public function observacao()
    {
        return $this->belongsTo(Observacao::class, 'observacao_id');
    }

    public function ingredientes()
    {
        return $this->belongsToMany(Insumo::class, 'receitas_ingredientes')->withPivot('quantidade', 'unidade');
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produtos_itens');
    }
}
