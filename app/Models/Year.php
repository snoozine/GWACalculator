<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $table = 'year';
    protected $fillable = [
        'user_id',
        'year',
        'term',
        'subjects',
    ];
    use HasFactory;
}
