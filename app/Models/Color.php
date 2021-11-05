<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // Relación n:m (colors - products)
    public function products(){
        return $this->belongsToMany(Product::class);
    }

    // Relación n:m (colors - sizes)
    public function sizes(){
        return $this->belongsToMany(Size::class);
    }
}
