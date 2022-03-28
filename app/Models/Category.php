<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Category extends Model
{
    use HasFactory;


    public function ChillCategory( )
    {
        return $this->hasMany(Category::class,'ParentId');
    }

    public function ParentCategory( )
    {
        return $this->belongsTo(Category::class,'ParentId','id');
    }

    protected $fillable = [
        'name',
        'ParentId'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
