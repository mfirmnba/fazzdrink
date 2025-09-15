<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'status', 'total', 'address', 'latitude', 'longitude', 'branch_id', 'address_id'
    ];

    // Relasi dengan Address
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    // Relasi dengan OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
