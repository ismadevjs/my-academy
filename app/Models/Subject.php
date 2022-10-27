<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'mawad_id',
        'type_id',
        'name',
        'file',
        'year',
    ];


    public function type() {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }

    public function mawad() {
        return $this->hasOne(Mawad::class, 'id', 'mawad_id');
    }
}
