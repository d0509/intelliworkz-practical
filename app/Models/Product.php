<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Mediable\Mediable;

class Product extends Model
{
    use HasFactory, SoftDeletes, Mediable;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'title',
        'code',
        'color'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
