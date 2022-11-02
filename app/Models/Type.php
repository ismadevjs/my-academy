<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'types';

    protected $fillable = [
        'name',
        'mawad_id'
    ];


    
    public function mawad() {
        return $this->hasOne(Mawad::class, 'id', 'mawad_id');
    }


}
