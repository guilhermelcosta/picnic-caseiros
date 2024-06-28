<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'observacao_id',
        'estoque',
    ];


    protected $dates = [
        'validade',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/produtos/'.$this->getKey());
    }

    public function itens()
    {
        return $this->hasMany(ProdutosItem::class);
    }

    public function observacao()
    {
        return $this->belongsTo(Observacao::class, 'observacao_id');
    }

    public function insumos()
    {
        return $this->belongsToMany(Insumo::class, 'produtos_itens')->withPivot('quantidade', 'unidade', 'porcentagem_mao_obra', 'porcentagem_lucro');
    }

    public function receitas()
    {
        return $this->belongsToMany(Receita::class, 'produtos_itens')->withPivot('quantidade', 'unidade', 'porcentagem_mao_obra', 'porcentagem_lucro');
    }
}
