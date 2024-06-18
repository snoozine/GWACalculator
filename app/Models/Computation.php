<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computation extends Model
{

    protected $table = 'computation';
    protected $fillable = [
        'user_id',
        'year',
        'term',
        'subject',
        'midterm',
        'units',
        'total',
    ];
    use HasFactory;
}
