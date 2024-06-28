<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'sobrenome',
        'apelido',
        'documento',
        'documentos_tipo_id',
        'data_aniversario',
        'endereco_id',
        'observacao_id',

    ];


    protected $dates = [
        'data_aniversario',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/clientes/'.$this->getKey());
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'endereco_id');
    }

    public function observacao()
    {
        return $this->belongsTo(Observacao::class, 'observacao_id');
    }

    public function tipo_documento()
    {
        return $this->belongsTo(DocumentosTipo::class, 'documentos_tipo_id', 'id');
    }
}
