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
    ];

    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $restaurant = Restaurant::all();
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->validations);

        $data = $request->all();

        $newProduct = new Product();
        $newProduct->name = $data['name'];
        $newProduct->slug = Product::slugger($data['name']);
        $newProduct->ingredients = $data['ingredients'];
        $newProduct->price = $data['price'];
        $newProduct->description = $data['description'];
        $newProduct->url_image = $data['url_image'];

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

    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $request->validate($this->validations);

        $data = $request->all();

        // aggiorno i dati nel database
        $product->name = $data['name'];
        $product->ingredients = $data['ingredients'];
        $product->price = $data['price'];
        $product->description = $data['description'];
        $product->url_image = $data['url_image'];
        // $product->restaurant_id = $data['restaurant_id'];
        // update
        $product->update();

        // redirect
        return to_route('admin.products.show', ['product' => $product]);
    }

    public function destroy(Product $product)
    {
        //
    }
}
