<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function restaurant() 
    {
        return $this->hasMany(Restaurant::class);
    }
}
