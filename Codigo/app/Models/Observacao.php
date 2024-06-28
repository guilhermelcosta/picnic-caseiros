<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observacao extends Model
{
    protected $table = 'observacoes';

    protected $fillable = [
        'observacao',

    ];


    protected $dates = [

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/observacoes/'.$this->getKey());
    }
}
