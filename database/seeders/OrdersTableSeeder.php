<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run(Faker $faker)
    {

        for ($i = 0; $i < 50; $i++) {
            $orders = Order::create([
                'total_price' => $faker->numberBetween(10, 150),
                'name' => $faker->name(),
                'surname' => $faker->lastName(),
                'email' => $faker->email(),
                'message' => $faker->text(),
                'payment_date' => $faker->dateTimeInInterval('-2 week', '+14 days'),
                'restaurant_id' => 3,
            ]);
            $order_product = OrderProduct::create([
                'order_id' => $orders->id,
                'product_id' => $faker->numberBetween(1, 30),
                'product_quantity' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
