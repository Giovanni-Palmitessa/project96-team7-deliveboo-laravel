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
    // public function run(Faker $faker)
    // {

    //     for ($i = 0; $i < 50; $i++) {
    //         $orders = Order::create([
    //             'total_price' => $faker->numberBetween(10, 150),
    //             'name' => $faker->firstName(),
    //             'surname' => $faker->lastName(),
    //             'email' => $faker->email(),
    //             'message' => $faker->text(200),
    //             'payment_date' => $faker->dateTime(),
    //             'restaurant_id' => $faker->numberBetween(1, 8),
    //         ]);

    //         $order_product = OrderProduct::create([
    //             'order_id' => $orders->id,
    //             'product_id' => $faker->numberBetween(1, 30), // Assicurati che questi IDs siano validi.
    //             'product_quantity' => $faker->numberBetween(1, 10),
    //         ]);
    //     };
    // }
    public function run(Faker $faker)
    {
        $numOfRestaurants = 8;
        $ordersPerRestaurant = 30;
        $productsPerOrder = 3;

        for ($i = 1; $i <= $numOfRestaurants; $i++) {
            for ($j = 0; $j < $ordersPerRestaurant; $j++) {
                $order = Order::create([
                    'total_price' => $faker->numberBetween(10, 150),
                    'name' => $faker->name(),
                    'surname' => $faker->lastName(),
                    'email' => $faker->email(),
                    'message' => $faker->text(),
                    'payment_date' => $faker->dateTimeInInterval('-2 week', '+14 days'),
                    'restaurant_id' => $i,
                ]);

                $productIds = $this->getUniqueProductIds($productsPerOrder, 30);

                foreach ($productIds as $productId) {
                    OrderProduct::create([
                        'order_id' => $order->id,
                        'product_id' => $productId,
                        'product_quantity' => $faker->numberBetween(1, 10),
                    ]);
                }
            }
        }
    }

    protected function getUniqueProductIds($count, $maxProductId)
    {
        $ids = [];
        while (count($ids) < $count) {
            $randomId = rand(1, $maxProductId);
            if (!in_array($randomId, $ids)) {
                $ids[] = $randomId;
            }
        }
        return $ids;
    }
}
