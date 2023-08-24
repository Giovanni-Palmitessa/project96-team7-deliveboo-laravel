<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function restaurant() 
    {
        return $this->hasMany(Restaurant::class);
    }
}
