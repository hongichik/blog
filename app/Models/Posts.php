<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'parent_id',
        'image',
        'summary',
        'content',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
