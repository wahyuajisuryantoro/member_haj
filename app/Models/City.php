<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    
    protected $table = 'cities';

    protected $fillable = [
        'code',
        'code_province',
        'name',
    ];
}
