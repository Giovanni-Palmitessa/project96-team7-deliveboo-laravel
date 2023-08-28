<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function dashboard()
    {
        $restaurant = Auth::user()->restaurant;

        if ($restaurant) {
            $products = $restaurant->products;
            // dd($products);
        } else {
            $products = [];
        }
        if ($restaurant) {
            $orders = Order::whereHas('products', function ($q) use ($restaurant) {
                $q->where('restaurant_id', $restaurant->id);
            })->get();
        }
        return view('admin.dashboard', compact('restaurant', 'products', 'orders'));
    }
}
