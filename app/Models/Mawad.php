<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mawad extends Model
{
    use HasFactory;

    protected $table = 'mawads';

    protected $fillable = [
        'name',
        'sanawat_id'
    ];

    public function sanawatss() {
        return $this->hasOne(Sanawat::class, 'id', 'sanawat_id');
    }


}
