<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                "total_price"      => "100",
                "products"     => [1, 3, 5, 6],
                "restaurant_id"      => "1",
            ],
            [
                "total_price"      => "50",
                "products"     => [20, 12, 15,],
                "restaurant_id"      => "2",
            ],
            [
                "total_price"      => "25",
                "products"     => [7, 23],
                "restaurant_id"      => "3",
            ],
            [
                "total_price"      => "75",
                "products"     => [1, 3, 8],
                "restaurant_id"      => "4",
            ],
        ];

        foreach ($orders as $objOrder) {
            $order = Order::create([
                "total_price"       => $objOrder['total_price'],
                "restaurant_id"       => $objOrder['restaurant_id'],
            ]);
            $order->products()->sync($objOrder['products']);
        }
    }
}
