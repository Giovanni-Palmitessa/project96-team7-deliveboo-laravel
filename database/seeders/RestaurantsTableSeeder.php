<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('deliveboo') as $restaurantData) {
            $category_ids = $restaurantData['category_id']; // Salviamo gli ID delle categorie
            unset($restaurantData['category_id']); // Rimuoviamo 'category_id' dai dati prima di inserirli

            $restaurant = Restaurant::create($restaurantData); // Crea il ristorante

            // $restaurant->categories()->attach($category_ids); // Associa le categorie al ristorante
            $restaurant->categories()->sync($category_ids);
        }
    }
}
