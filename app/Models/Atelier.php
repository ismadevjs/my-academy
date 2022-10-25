<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atelier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'icon',
        'type'
    ];



    // public function types() {
    //     return $this->hasMany(AtelierType::class, 'id', 'type');
    // }
}
