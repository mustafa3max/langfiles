<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'thumbnail',
        'desc',
        'article',
        'author',
        'enabled',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_att' => 'datetime',
    ];
}
