<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $fillable = [
        'nome',
        'apelido',
        'email',
        'telefone',
        'aprovado',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/candidatos/'.$this->getKey());
    }
}
