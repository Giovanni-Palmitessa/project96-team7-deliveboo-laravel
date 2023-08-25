<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private $validations = [
        'name' => 'required|string|max:50',
        'description' => 'required|string',
        'city' => 'required|string|max:30',
        'address' => 'required|string|max:50',
        'vat' => 'required|string|max:10|min:10',
        'url_image' => 'nullable|url|max:300',
        'priceRange' => 'nullable|integer',
        'rating_value' => 'nullable|integer',
        'review_count' => 'nullable|integer',
        'categories' => 'nullable|array',
        'categories.*' => 'integer|exists:categories,id',
    ];

    private $validations_messages = [
        'required' => 'Il campo :attribute è richiesto',
        'min' => 'Il campo :attribute deve avere almeno :min caratteri',
        'max' => 'Il campo :attribute deve avere massimo :max caratteri',
        'url' => 'Il campo :attribute deve essere un URL valido',
        'date' => 'Il campo :attribute deve essere una data in formato valido',
        'exists' => 'Il campo :attribute non è valido',
        'integer' => 'Il campo :attribute deve essere un numero intero.',
    ];
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
        $newRestaurant->city = $data['city'];
        $newRestaurant->address = $data['address'];
        // $newRestaurant->image = $imagePath;
        $newRestaurant->vat = $data['vat'];
        $newRestaurant->url_image = $data['url_image'];
        $newRestaurant->priceRange = $data['description'];
        $newRestaurant->rating_value = $data['rating_value'];
        $newRestaurant->review_count = $data['review_count'];

        $newRestaurant->save();

        // associare i tag
        $newRestaurant->categories()->sync($data['categories'] ?? []);

        // reindirizzare su una rotta di tipo get

        return to_route('admin.restaurants.show', ['restaurant' => $newRestaurant]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->firstOrFail();
        
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->firstOrFail();

        $products = Product::all();
        $categories = Category::all();
        
        return view('admin.restaurants.edit', compact('restaurant', 'products', 'categories'));
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
