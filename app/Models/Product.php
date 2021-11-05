<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    // Relación 1:n (products - sizes)
    public function sizes(){
        return $this->hasMany(Size::class);
    }

    // Relación 1:n inversa (brands - products)
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    // Relación 1:n inversa (subcategories - products)
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    // Relación n:m (products - colors)
    public function colors(){
        return $this->belongsToMany(Color::class);
    }

    // Relación 1:n polimórfica (products - images)
    public function images(){
        return $this->morphMany(Image::class, "imageable");
    }
}
