<?php

namespace App\Http\Controllers\Admin;

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

        return view('admin.dashboard', compact('restaurant', 'products'));
    }
}
