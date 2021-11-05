<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_id'
    ];

    // Relación 1:n inversa (products - sizes)
    public function product(){
        return $this->belongsTo(Product::class);
    }

    // Relación n:m (sizes - colors)
    public function colors(){
        return $this->belongsToMany(Color::class);
    }
}
