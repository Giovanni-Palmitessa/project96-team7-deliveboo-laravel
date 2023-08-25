<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();

        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.restaurants.create', compact('products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validare i dati del form
        $request->validate($this->validations, $this->validations_messages);

        $data = $request->all();

        // salvare l'immagine nella cartella degli uploads
        // prendere il percorso dell'immagine appena salvata
        // $imagePath = null;

        // if (isset($data['image'])) {
        //     $imagePath = Storage::put('uploads', $data['image']);
        // }

        // if ($request->has('image')) {
        //     $imagePath = Storage::disk('public')->put('uploads', $data['image']);
        // }

        // salvare i dati nel db se validi
        $newRestaurant = new Restaurant();
        $newRestaurant->name = $data['name'];
        $newRestaurant->description = $data['description'];
        $newRestaurant->type_id = $data['type_id'];
        $newRestaurant->url_image = $data['url_image'];
        $newRestaurant->image = $imagePath;
        $newRestaurant->pickup_date = $data['pickup_date'];
        $newRestaurant->deploy_date = $data['deploy_date'];
        $newRestaurant->description = $data['description'];

        $newRestaurant->save();

        // associare i tag
        $newPortfolio->technologies()->sync($data['technologies'] ?? []);

        // reindirizzare su una rotta di tipo get

        return to_route('admin.portfolios.show', ['portfolio' => $newPortfolio]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
