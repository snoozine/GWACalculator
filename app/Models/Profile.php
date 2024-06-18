<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'age',
        'program',
        'year',
        'email',
        'bday',
        'nationality',
        'status',
        'gender',
        'address',
        'image',
    ];
    use HasFactory;
}
