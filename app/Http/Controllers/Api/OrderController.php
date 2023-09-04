<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Braintree\Gateway;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Http\Requests\PayRequest;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    // public function index(Request $request) {
    //     $orders = Order::all();
    //     return OrderResource::collection($orders);
    // }

    public function generate(Request $request,Gateway $gateway){
        $token = $gateway->clientToken()->generate();
        
        $data = [
            'success' => true,
            'token' => $token
        ];
        
        return response()->json($data,200);
    }

    public function makePayment(PayRequest $request,Gateway $gateway){

        $total = 0;
        $data = $request->all();
        $cart = $data['cart'];

        foreach ($cart as $item) {
            $product = Product::where('id', $item['id'])->first();
            $total += $product->price * $item['qnt'];
        }


        $result = $gateway->transaction()->sale([
            'amount' => $total,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $order = new Order();
            $order->total = $total;
            $order->restaurant_id = $data['restaurant_id'];
            $order->name = $data['name'];
            $order->surname = $data['surname'];
            $order->email = $data['email'];
            $order->message = $data['message'];
            $order->save();

            foreach ($cart as $item) {
                $order_product = new OrderProduct();
                $order_product->order_id = $order->id;
                $order_product->product_id = $item['id'];
                $order_product->product_quantity = $item['qnt'];
                $order_product->save();
            }

            if ($order && $order_product) {
                $orderMessage = 'I dati sono stati salvati';
                //invio e-mail
            }

            $data = [
            'success' => true,
            'message' => "Transazione eseguita con Successo!"
            ];
            return response()->json($data,200);
            
        } else {
            $data = [
                'success' => false,
                'message' => "Transazione Fallita!!"
            ];
            return response()->json($data,401);
        }



        // if($result->success){
        //     $data = [
        //         'success' => true,
        //         'message' => "Transazione eseguita con Successo!"
        //     ];
        //     return response()->json($data,200);
        // }else{
        //     $data = [
        //         'success' => false,
        //         'message' => "Transazione Fallita!!"
        //     ];
        //     return response()->json($data,401);
        // }
    }
}
