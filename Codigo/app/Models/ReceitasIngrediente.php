<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceitasIngrediente extends Model
{
    protected $fillable = [
        'receita_id',
        'insumo_id',
        'quantidade',
        'unidade',
    
    ];
    
    
    protected $dates = [
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/receitas-ingredientes/'.$this->getKey());
    }
}
