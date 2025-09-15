<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name', 'address', 'latitude', 'longitude', 'whatsapp_number'
    ];
}
