<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanawat extends Model
{
    use HasFactory;
    protected $table = 'sanawats';

    protected $fillable = [
        'name',
        'taalim_id'
    ];

    public function taalim() {
        return $this->hasOne(Taalim::class, 'id', 'taalim_id');
    }
}
