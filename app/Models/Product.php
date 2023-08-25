<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Restaurant;
use App\Traits\Slugger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Slugger;
    public $timestamps = false;

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
