<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'category_id', 'stock','image',];

    // Relasi dengan kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi dengan cart items
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // Relasi dengan order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relasi dengan reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
