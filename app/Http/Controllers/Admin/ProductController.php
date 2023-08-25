<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Restaurant;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $validations = [
        'name' => 'required|string|min:2|max:50',
        'ingredients' => 'required|string',
        'price' => 'required|integer',
        'description' => 'required|string',
        'url_image' => 'required|string',
        'restaurant_id' => 'required|integer'
    ];

    private $validation_messages = [
        // name
        'name.required' => 'Il campo Nome è obbligatorio',
        'name.min' => 'Il campo Nome deve avere almeno :min caratteri',
        'name.max' => 'Il campo Nome deve avere massimo :max caratteri',
        // description
        'description.required' => 'Il campo Descrizione è obbligatorio',
        // url_image
        'url_image.required' => 'Il campo Url Immagine è obbligatorio',
        // price
        'price.integer' => 'Il prezzo deve essere un\' intero',
        // restaurant_id
        'restaurant_id' => 'Il restaurant ID è obbligatorio'
    ];

    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->validations, $this->validation_messages);

        $data = $request->all();

        $newProduct = new Product();
        $newProduct->name = $data['name'];
        $newProduct->slug = Product::slugger($data['name']);
        $newProduct->ingredients = $data['ingredients'];
        $newProduct->price = $data['price'];
        $newProduct->description = $data['description'];
        $newProduct->url_image = $data['url_image'];
        $newProduct->restaurant_id = $data['restaurant_id'];

        // salvo il nuovo Prodotto
        $newProduct->save();

        // redirect
        return to_route('admin.products.show', ['product' => $newProduct]);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
