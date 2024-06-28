<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';

    protected $fillable = [
        'nome',
        'endereco_id',
        'nome_contato',
        'observacao_id',
        'is_ativo',

    ];


    protected $dates = [

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/fornecedores/' . $this->getKey());
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'endereco_id'); 
    }

    public function observacao()
    {
        return $this->belongsTo(Observacao::class, 'observacao_id');
    }

    public function contatos()
    {
        return $this->hasMany(Contato::class, 'fornecedor_id', 'id');
    }
}
