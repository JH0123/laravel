<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'image',
        'company',
        'user_id',
        'car_name',
        'year',
        'pay',
        'view',
        'kinds'
    ];
    use HasFactory;
}
