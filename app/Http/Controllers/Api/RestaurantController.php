<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $query = Restaurant::with(['categories']);

        if ($request->has('category_id')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->whereIn('id', $request->category_id);
            });
        }

        $restaurants = $query->paginate(6);

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        return response()->json([
            'success' => $restaurant ? true : false,
            'results'    => $restaurant,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
