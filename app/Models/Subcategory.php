<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    // Relación 1:n (subcategories - products)
    public function products(){
        return $this->hasMany(Product::class);
    }

    // Relación 1:n inversa (categories - subcategories)
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
