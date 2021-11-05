<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'icon'
    ];

    // Relación 1:n (categories - subcategories)
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    // Relación n:m (categories - brands)
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    // Relación 1:n indirecta (categories - products)
    public function products(){
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }
}
