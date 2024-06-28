<?php

namespace App\Models;

use App\Enums\StructEnums\UnidadeMedidaEnum;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $fillable = [
        'descricao',
        'observacao_id',
        'percentual_desperdicio',
        'quantidade_referencia',
        'unidade_referencia',
        'preco_pos_desperdicio',
        'is_ativo',

    ];


    protected $dates = [

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/insumos/'.$this->getKey());
    }

    public function receitas()
    {
        return $this->belongsToMany(Receita::class, 'receitas_ingredientes')->withPivot('quantidade', 'unidade');
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produtos_itens')->withPivot('quantidade', 'unidade', 'porcentagem_mao_obra', 'porcentagem_lucro');
    }

    public function observacao()
    {
        return $this->belongsTo(Observacao::class, 'observacao_id');
    }

    public function custos()
    {
        return $this->hasMany(InsumosCusto::class, 'insumo_id', 'id');
    }

    function updatePrecoPosDesperdicio()
    {
        $custo = $this->custos->sortByDesc('data_compra')->first();
        if ($custo) {
            $quantidade = $custo->quantidade;
            if ($this->unidade_referencia != $custo->unidade) {
                $unidade_compra = UnidadeMedidaEnum::getUnidadeMedidaByValue(intval($custo->unidade));
                $unidade_referencia = UnidadeMedidaEnum::getUnidadeMedidaByValue(intval($this->unidade_referencia));
                $quantidade = UnidadeMedidaEnum::convert($custo->quantidade, $unidade_compra, $unidade_referencia);
            }
            $valor_unitario = $custo->valor_compra / $quantidade;
            $this->preco_pos_desperdicio = $valor_unitario / (1 - ($this->percentual_desperdicio / 100));
            $this->save();
        }
    }

    public function calculaCusto()
    {
        if ($this->preco_pos_desperdicio) {
            $quantidade = $this->pivot->quantidade;
            if ($this->unidade_referencia != $this->pivot->unidade) {
                $unidade_utilizada = UnidadeMedidaEnum::getUnidadeMedidaByValue(intval($this->pivot->unidade));
                $unidade_referencia = UnidadeMedidaEnum::getUnidadeMedidaByValue(intval($this->unidade_referencia));
                $quantidade = UnidadeMedidaEnum::convert($this->pivot->quantidade, $unidade_utilizada, $unidade_referencia);
            }
            $custoInsumo = $quantidade * $this->preco_pos_desperdicio;
            $maoDeObra = $custoInsumo * ($this->pivot->porcentagem_mao_obra / 100);
            $lucro = $custoInsumo * ($this->pivot->porcentagem_lucro / 100);
            return $custoInsumo + $maoDeObra + $lucro;
        } else {
            return null;
        }
    }
}
