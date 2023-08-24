<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = config('products');
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
