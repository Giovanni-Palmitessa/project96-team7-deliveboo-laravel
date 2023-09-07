<?php

namespace App\Http\Controllers\Api;

use App\Models\Guest;
use App\Models\Order;
use Braintree\Gateway;
use App\Models\Product;
use App\Mail\MailToAdmin;
use App\Mail\MailToGuest;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PaymentRequest;

class OrderController extends Controller
{
    public function makePayment(PaymentRequest $request, Gateway $gateway)
    {
        $total_price = 0;
        $data = $request->all();
        $cart = $data['cart'];

        foreach ($cart as $item) {
            $product = Product::find($item['id']);

            if (!$product) {
                return response()->json(['success' => false, 'message' => 'Prodotto non trovato.'], 404);
            }

            $total_price += $product->price * $item['qnt'];
        }

        $result = $gateway->transaction()->sale([
            'amount' => $total_price,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        // Log::info(json_encode($result)); cartella storage
        if ($result->success) {
            $order = Order::create([
                'total_price' => $total_price,
                'restaurant_id' => $data['restaurant_id'],
                'name' => $data['name'],
                'surname' => $data['surname'],
                'email' => $data['email'],
                'message' => $data['message'],
            ]);


            foreach ($cart as $item) {
                $orderProduct = OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_quantity' => $item['qnt'],
                ]);
            }

            // if ($order && $order_product) {
            //     $orderMessage = 'I dati sono stati salvati';
            //     //invio e-mail
            //     Mail::to($order->customer_email)->send(new NewOrderEmail($order));

            if($order && $orderProduct) {
                Guest::create([
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'email' => $data['email'],
                    'message' => $data['message'],
                ]);
                
                Mail::to($order->email)->send(new MailToGuest($order));

                Mail::to(env('ADMIN_ADDRESS', 'admin@deliveboo.com'))->send(new MailToAdmin($order));
            }

            // Optional: Queue up an email job, etc.

            return response()->json(['success' => true, 'message' => 'Transazione eseguita con successo.'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Transazione fallita.'], 401);
        }
    }


    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    // public function makePayment(PaymentRequest $request, Gateway $gateway)
    // {

    //     $total_price = 0;
    //     $data = $request->all();
    //     $cart = $data['cart'];

    //     foreach ($cart as $item) {
    //         $product = Product::where('id', $item['id'])->first();
    //         $total_price += $product->price * $item['qnt'];
    //     }


    //     $result = $gateway->transaction()->sale([
    //         'amount' => $total_price,
    //         'paymentMethodNonce' => $request->token,
    //         'options' => [
    //             'submitForSettlement' => true
    //         ]
    //     ]);

    //     if ($result->success) {
    //         $order = new Order();
    //         $order->total_price = $total_price;
    //         $order->restaurant_id = $data['restaurant_id'];
    //         $order->name = $data['name'];
    //         $order->surname = $data['surname'];
    //         $order->email = $data['email'];
    //         $order->message = $data['message'];
    //         $order->save();

    //         foreach ($cart as $item) {
    //             $order_product = new OrderProduct();
    //             $order_product->order_id = $order->id;
    //             $order_product->product_id = $item['id'];
    //             $order_product->product_quantity = $item['qnt'];
    //             $order_product->save();
    //         }

    //         if ($order && $order_product) {
    //             $orderMessage = 'I dati sono stati salvati';
    //             //invio e-mail
    //         }

    //         $data = [
    //             'success' => true,
    //             'message' => "Transazione eseguita con Successo!"
    //         ];
    //         return response()->json($data, 200);
    //     } else {
    //         $data = [
    //             'success' => false,
    //             'message' => "Transazione Fallita!!"
    //         ];
    //         return response()->json($data, 401);
    //     }



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
