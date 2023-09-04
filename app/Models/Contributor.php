<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'thumbnail',
        'phone',
        'path_profile',
        'title',
        'desc',
        'path_1',
        'path_2',
        'path_3',
        'enabled',
        'website'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];
}
