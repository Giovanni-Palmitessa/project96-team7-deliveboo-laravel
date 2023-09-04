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
        // $orders = [
        //     [
        //         "total_price"       => "100",
        //         "name"              => "Davide",
        //         "surname"           => "Farci",
        //         "email"             => "davide.farci@gmail.com",
        //         "message"           => "",
        //         "restaurant_id"     => "1",
        //         "products"          => [1, 2],
        //     ],
        //     [
        //         "total_price"       => "50",
        //         "name"              => "Giovanni",
        //         "surname"           => "Palmitessa",
        //         "email"             =>  "giovanni.palmitessa@gmail.com",
        //         "message"           => "",
        //         "restaurant_id"     => "2",
        //         "products"          => [3, 4],
        //     ],
        //     [
        //         "total_price"       => "25",
        //         "name"              => "Domenico",
        //         "surname"           => "Ferrari",
        //         "email"             => "domenico.ferrari@gmail.com",
        //         "message"           => "",
        //         "restaurant_id"     => "3",
        //         "products"          => [5, 6],
        //     ],
        //     [
        //         "total_price"       => "75",
        //         "name"              => "Loris",
        //         "surname"           => "Marzocchi",
        //         "email"             => "loris.marzocchi@gmail.com",
        //         "message"           => "",
        //         "restaurant_id"     => "4",
        //         "products"          => [7, 8],
        //     ],
        // ];

        // foreach ($orders as $objOrder) {
        //     $order = Order::create([
        //         "total_price"       => $objOrder['total_price'],
        //         "name"              => $objOrder['name'],
        //         "surname"           => $objOrder['surname'],
        //         "email"             => $objOrder['email'],
        //         "message"           => $objOrder['message'],
        //         "restaurant_id"     => $objOrder['restaurant_id'],
        //     ]);
        //     $order->products()->sync($objOrder['products']);
        // }
    }
}
