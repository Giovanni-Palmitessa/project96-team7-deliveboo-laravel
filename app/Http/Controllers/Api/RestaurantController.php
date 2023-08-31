<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $query = Restaurant::query()->with(['categories']); // Iniziamo con una query vuota

        if ($request->has('category_id')) {
            $category_ids = is_array($request->category_id) ? $request->category_id : [$request->category_id]; // Accetta sia un array che un singolo ID

            $query->whereHas('categories', function ($q) use ($category_ids) {
                $q->whereIn('id', $category_ids);
            }, '=', count($category_ids));

            // Aggiungi questa parte per escludere ristoranti con categorie extra
            $query->whereDoesntHave('categories', function ($q) use ($category_ids) {
                $q->whereNotIn('id', $category_ids);
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
