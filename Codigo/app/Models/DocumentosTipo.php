<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentosTipo extends Model
{
    protected $fillable = [
        'descricao',
        'is_ativo',
    
    ];
    
    
    protected $dates = [
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/documentos-tipos/'.$this->getKey());
    }
}
