<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableName extends Model
{
    protected $table = 'table_name';

    protected $fillable = [
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/table-names/'.$this->getKey());
    }
}
