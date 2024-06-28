<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsumosMarca extends Model
{
    protected $fillable = [
        'nome',
        'is_ativo',
    
    ];
    
    
    protected $dates = [
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/insumos-marcas/'.$this->getKey());
    }
}
