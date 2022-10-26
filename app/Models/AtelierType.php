<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtelierType extends Model
{
    use HasFactory;
    protected $table = 'ateliertypes';
    protected $fillable = ['name', 'parent'];

    public function parents() {
        return $this->hasMany(AtelierType::class, 'id', 'parent');
    }
    public function childs() {
        return $this->belongsTo(AtelierType::class, 'id', 'parent');
    }
}
