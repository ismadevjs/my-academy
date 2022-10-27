<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taalim extends Model
{
    use HasFactory;
    protected $table = 'taalims';

    protected $fillable = [
        'name'
    ];
}
