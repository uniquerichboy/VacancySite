<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancies extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'amount',
        'phone',
        'user_id',
        'telegram',
        'vk',
        'city',
        'experience',
        'skills',
    ];
}
